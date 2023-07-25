<?php

namespace App\Exports;

use App\Models\Comic;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class ComicsExport implements
    // FromCollection, 
    FromQuery,
    ShouldAutoSize, 
    WithMapping,
    WithHeadings,
    WithEvents,
    WithColumnFormatting
{
    use Exportable; // jadi di controller ga perlu pake Excel::download

    private $statusId;
    private $categoryId;
    private $dateFrom;
    private $dateTo;

    public function __construct($statusId, $categoryId, $dateFrom, $dateTo)
    {
        $this->statusId = $statusId;
        $this->categoryId = $categoryId;
        $this->dateFrom = \DateTime::createFromFormat('m/d/Y', $dateFrom)->format('Y-m-d'); // ini ngubah string yang formatnya mdY jadi format date Ymd biar cocok sama di kolom created_at mySQL.
        $this->dateTo = \DateTime::createFromFormat('m/d/Y', $dateTo)->format('Y-m-d'); // ini ngubah string yang formatnya mdY jadi format date Ymd biar cocok sama di kolom created_at mySQL.
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    // fetching data berupa collection untuk nanti dimapping.
    // public function collection()
    // {
    //     return Comic::with('author', 'category', 'status')->get();
    // }

    // public function collection()
    // {

    //     $comicQuery = Comic::with('author', 'category', 'status')
    //                                 ->whereDate('created_at', '>=', $this->dateFrom)
    //                                 ->whereDate('created_at', '<=', $this->dateTo);

    //     if ($this->statusId != 'all') {
    //         $comicQuery->where('status_id', $this->statusId);
    //     }

    //     if ($this->categoryId != 'all') {
    //         $comicQuery->where('category_id', $this->categoryId);
    //     }

    //     $comic = $comicQuery->get();
        
    //     return $comic;
    // }

    // fetching data menggunakan query
    public function query()
    {

        $comicQuery = Comic::with('author', 'category', 'status')
                                    ->whereDate('created_at', '>=', $this->dateFrom)
                                    ->whereDate('created_at', '<=', $this->dateTo);

        if ($this->statusId != 'all') {
            $comicQuery->where('status_id', $this->statusId);
        }

        if ($this->categoryId != 'all') {
            $comicQuery->where('category_id', $this->categoryId);
        }
        
        return $comicQuery;
    }

    // ini untuk nambahin nama kolomnya diatas data kita.
    public function headings(): array
    {
        return [
            'Comic Id',
            'Comic Title',
            'Author Name',
            'Comic Category',
            'Comic Status',
            'Created At'
        ];
    }

    // nampilin kolom spesifik yang mau ditampilin aja, jadi engga kayak return collection yang bakal nampilin semua kolom di DB kita.
    public function map($comic): array
    {
        return [
            $comic->id,
            $comic->title,
            $comic->author->name,
            $comic->category->name,
            $comic->status->name,
            Date::dateTimeToExcel($comic->created_at),
        ];
    }

    // method ini harus ada karena Date::dateTimeToExcel hanya merubah DateTime PHP menjadi tanggal yang dapat dimengerti Excel,
    // namun Excel tidak tau kita ingin menampilkannya dalam fomat apa, oleh karena itu kita harus kasih tau format yang kita mau.
    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY, //Ubah format kolom tanggal (dalam kasus ini kolom F), jadi date/month/year. 
        ];
    }

    // Kasih style
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFF0000']
                    ]
                ]);

                // buat semua cellnya center
                $event->sheet->getStyle('A1:' . $event->sheet->getHighestColumn() . $event->sheet->getHighestRow())
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);
                
                // buat semua cellnya ada border
                $event->sheet->getStyle('A1:' . $event->sheet->getHighestColumn() . $event->sheet->getHighestRow())
                ->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);
            },
        ];
    }
}

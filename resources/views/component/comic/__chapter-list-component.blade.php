<div class="latest-chapter-update">
    # Latest Chapter Update
  </div>

  <div class="first-last-chapter-button-container">
    <div class="first-last-chapter-container">
      <button class="first-last-button">
        <div class="upper-text-button">
          Read First
        </div>
        <div class="lower-text-button">
          {{ $first_chapter }}
        </div>
      </button>
    </div>

    <div class="first-last-chapter-container">
      <button class="first-last-button">
        <div class="upper-text-button">
          Read Last
        </div>
        <div class="lower-text-button">
          {{ $last_chapter }}
        </div>
      </button>
    </div>
  </div>

  <div class="chapter-container">
    @foreach($all_chapters as $allChapter)
      @php
        $chapterReleasedTime = $allChapter->created_at->diffInDays() < 7 ? 
        $allChapter->created_at->diffForHumans() :
        $allChapter->created_at->format('d M Y');        
      @endphp
      
      <div class="chapter-number-container">
        <div class="chap-number">
          {{ $allChapter->number }}
        </div>

        <div class="single-chapter-info">
          <div class="view-count-style">
            @php
              $view = $allChapter->view ? $allChapter->view->all_time_view_count : 0;
              echo $view;
            @endphp
            <span data-feather="eye"></span>
          </div>
          <div class="chap-release-date">
            {{ $chapterReleasedTime }}
          </div>
        </div>
      </div>
    @endforeach
</div>
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile',[
            'active' => null,
        ]);
    }

    public function updateProfile(User $user, UpdateProfileRequest $request)
    {
        $validatedData = $request->validated();
        if($request->storeImage()) $validatedData['image'] = $request->storeImage(); // disini pakai if, karena bisa jadi user ga mau update imagenya, jadinya null dan kita ga mau image usernya jadi ilang.

        if ($validatedData['new-password']) {
            $validatedData['password'] = $validatedData['new-password'];
        }

        $user = User::find($user->id);
        $user->update(Arr::except($validatedData, 'new-password'));

        return back()->with('success', 'Profile Data Has Been Updated!');
    }
}

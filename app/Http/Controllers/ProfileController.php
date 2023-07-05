<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
                'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20',
                'not_in: twitter, edit-profile'],
                'email' => ['required', 'unique:users,email,' .auth()->user()->id],
                'old_password' => 'nullable',
                'new_password' => ['nullable', 'min:6'],
        ]);

        $new_password = $request->filled('new_password') ? $request->new_password : null;

        if ($request->filled('old_password')) {
            $user = auth()->user();

            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Current password wrong']);
            } else {
                $new_password = $request->new_password;
            }
        }

        if($request->photo) {
            $image = $request->file('photo');
            $image_name = Str::uuid() . "." . $image->extension();
            $image_server = Image::make($image);
            $image_server->fit(1000, 1000);
            $image_path = public_path('profiles'). '/' . $image_name;
            $image_server->save($image_path);
        }

        //Save changes
            $user = User::find(auth()->user()->id);
            $user->username = $request->username;
            $user->image = $image_name ?? auth()->user()->image ?? null;
            $user->email = $request->email ?? auth()->user()->email;
            $user->password = Hash::make($new_password) ?? auth()->user()->password;
            $user->save();

        return redirect()->route('posts.index', $user->username);

    }
}

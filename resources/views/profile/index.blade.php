@extends('layouts.app')

@section('title')
    Edit Profile: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username"
                           name="username"
                           type="text"
                           placeholder="Your Username"
                           class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                           value="{{ auth()->user()->username }}" />
                    @error('username')
                    <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email"
                           name="email"
                           type="email"
                           placeholder="Email"
                           class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                           value="{{ auth()->user()->email }}" />
                    @error('email')
                    <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="old_password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="old_password" name="old_password" type="password" placeholder="Your password" class="border p-3 w-full rounded-lg @error('old_password') border-red-500 @enderror"/>
                    @error('old_password')
                    <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">New Password</label>
                    <input id="new_password" name="new_password" type="password" placeholder="Repeat your password" class="border p-3 w-full rounded-lg @error('new_password') border-red-500 @enderror"/>
                    @error('new_password')
                    <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="photo" class="mb-2 block uppercase text-gray-500 font-bold">Profile photo</label>
                    <input id="photo"
                           name="photo"
                           type="file"
                           class="border p-3 w-full rounded-lg"
                           value=""
                           accept=".jpg, .jpeg, .png"
                    />
                </div>
                <input type="submit"
                       value="Save changes"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors
                       cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title')
    Edit Profile: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0">
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

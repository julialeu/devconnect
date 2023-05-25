@extends('layouts.app')

@section('titulo')
        Register in DevConnect
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('../../img/registrar.jpg') }}" alt="Image register user">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</label>
                    <input id="name" name="name" type="text" placeholder="Your name" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" />
                    @error('name')
{{--                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">Please note: Name is required</p>--}}
                        <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" type="text" placeholder="Your username" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}"/>
                    @error('username')
                    <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" type="email" placeholder="Your email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}"/>
                    @error('email')
                    <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" type="password" placeholder="Your password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"/>
                    @error('password')
                    <p class="text-red-500 text-xs my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat your password" class="border p-3 w-full rounded-lg"/>
                </div>
                <input type="submit" value="Create account" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection

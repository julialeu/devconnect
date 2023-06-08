@extends('layouts.app')

@section('titulo')
    {{ $post->title }}

@endsection

@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post image {{ $post->title }}">
            <div class="p-3">
                <p>0 likes</p>
            </div>
            <div>
                <p class="font-bold"> {{ $post->user->username }} </p>
                <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }} </p>
                <p class="mt-5">
                    {{ $post->description }}
                </p>
            </div>
        </div>
        <div class="md:w-1/2">
            2
        </div>
    </div>

@endsection
@extends('layouts.app')

@section(('titulo'))
    Main page
@endsection

@section(('contenido'))
    <x-list-post :posts="$posts"/>
@endsection

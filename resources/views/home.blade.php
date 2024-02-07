@extends('layouts.app')
@livewireStyles

@section('titulo')

@endsection

@livewire('search')

 @section('contenido')
        <x-listar-post :posts="$posts" />
 @endsection

 @livewireScripts



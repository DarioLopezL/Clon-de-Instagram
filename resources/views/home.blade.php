@extends('layouts.app')
@livewireStyles

@section('titulo')

@endsection

 @section('contenido')
        <x-listar-post :posts="$posts" />
 @endsection

 @livewireScripts



@extends('layouts.app')

@section('titulo')
Editar Perfil: {{ auth()->user()->username }}
@endsection

@auth
@section('search-bar')
<div class="mt-2 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute left-2 top-2 w-6 h-6 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
        <input type="text" placeholder="Buscar" class="p-2 pl-10 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300 transition-all">

</div>
@endsection
@endauth

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" action="{{ route('perfil.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input type="text" name="username" id="username" placeholder="Tu Nombre de usuario" class="border p-3 w-full rounded-lg @error('username')
                    border-red-500
                @enderror"
                value="{{ auth()->user()->username }}"
                >
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen Perfil
                </label>
                <input type="file" name="imagen" id="imagen"
                class="border p-3 w-full rounded-lg "

                accept=".jpg, .jpeg, .png "
                >
            </div>
            <input type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection

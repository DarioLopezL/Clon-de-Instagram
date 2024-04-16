<div>
    <div class="max-w-sm mx-auto">
        <form class="flex items-center">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                    </svg>
                </div>
                <input wire:model.live="searchTerm" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2.5" placeholder="Buscar por Username..." required />
            </div>
        </form>
        <div class="mt-1">
            <ul class="bg-white border border-gray-200 rounded-md shadow-md {{ $searchTerm ? '' : 'hidden' }}">
                @if($users->count() > 0)
                    @foreach($users as $user)
                        <li class="px-4 py-2 border-b border-gray-200">{{ $user->username }}</li>
                    @endforeach
                @else
                    <li class="px-4 py-2 text-gray-500">No se encontraron usuarios.</li>
                @endif
            </ul>
        </div>
    </div>
</div>



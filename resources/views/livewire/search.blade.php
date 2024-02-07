<div>
    <input wire:model="search" type="text" placeholder="Buscar por name o username">

    @if ($users->count())
        <table>
            <!-- Tu código para mostrar los resultados -->
        </table>
    @else
        <div class="card-body">
            <strong>No hay registros</strong>
        </div>
    @endif
</div>

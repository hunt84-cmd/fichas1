<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TipoPrograma;

class TipoProgramasTable extends DataTableComponent
{
    protected $model = TipoPrograma::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Categoria", "categoria")
                ->sortable()
                ->searchable(),
            Column::make("Grupo", "grupo.nombre")
                ->sortable()
                ->searchable(),
        ];
    }
}

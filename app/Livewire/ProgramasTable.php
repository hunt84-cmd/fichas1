<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Programa;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class ProgramasTable extends DataTableComponent
{
    protected $model = Programa::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setAdditionalSelects(['origen','dias','porciento_musica']);;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->sortable(),
            Column::make("Objetivo", "objetivo")
                ->sortable(),
            Column::make("Creacion", "creacion")
                ->sortable(),
            Column::make("Emisora", "emisora.nombre")
                ->sortable(),
            Column::make('Origen')
                ->label(fn ($row, Column $column) => $row->origen == 1 ? "Interno" : "Externo" ),
            Column::make('Dias')
                ->label(fn ($row, Column $column) =>
                implode(",", $row->dias)
                ),
            Column::make('Musica')
                ->label(fn ($row, Column $column) =>
                    "Cubana: ".$row->porciento_musica[0]."<br> Extranjera: ".$row->porciento_musica[1]
                )->html(),
            Column::make("Funcion", "funcion.nombre")
                ->sortable(),
            Column::make("Tipo", "tipo_programa.nombre")
                ->sortable(),
        ];
    }

    public function origen($id)
    {
        return "hola";
    }
}

<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Programa;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Action;
use Livewire\Attributes\On;
use Exception;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class ProgramasTable extends DataTableComponent
{
    protected $model = Programa::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setAdditionalSelects(['origen','dias','porciento_musica']);
        $this->setActionsInToolbarEnabled();
    }

    public function actions(): array
    {
        return [
            Action::make('Crear')
                ->setIcon('fas fa-plus')
                ->setWireAction('wire:click')
                ->setWireActionDispatchParams("'openModal', { component: 'programas.programa-create' }")
        ];
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
            Column::make('Acciones')
                ->label(
                    fn($row) => <<<HTML
        <div class="space-x-2">
            <button class="btn  btn-primary" wire:click="editar({$row->id})" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem"><span class="fas fa-edit"></span> Editar</button>
            <button class="btn  btn-danger " wire:click="eliminar({$row->id})" wire:confirm="Seguro quieres eliminar?" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem"><span class="fas fa-trash-alt"></span> Eliminar</button>
        </div>
        HTML
                )
                ->html(),
        ];
    }

    #[On('refreshprogramas')]
    public function builder(): Builder
    {
        return Programa::query();
    }

    public function editar($id)
    {
        $this->dispatch('openModal',  'programas.programa-edit',["id" => $id]);
    }

    public function eliminar($id)
    {
        try {
            $item = Programa::findOrFail($id);
            $item->delete();
            flash()->success('Eliminado ',[],'Programa');
        } catch (Exception $e) {
            flash()->error('Error: ',[],'Programa');
        }
    }
}

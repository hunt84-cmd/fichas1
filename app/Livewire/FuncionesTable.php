<?php

namespace App\Livewire;

use App\Models\Grupo;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Action;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Funcion;

class FuncionesTable extends DataTableComponent
{
    protected $model = Funcion::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setActionsInToolbarEnabled();
        $this->setActionWrapperAttributes([
            'style' => 'padding: 0.1rem !important;'
        ]);
//        $this->setSearchIcon('heroicon-m-magnifying-glass');
        $this->setThAttributes(function(Column $column) {
            if ($column->getTitle() == 'Acciones') {
                return [
//                    'class' => 'text-end',
                    'style' => 'width:12rem;text-align:center',
                ];
            }
            return [];
        });
//        $this->setTdAttributes(function(Column $column, $row, $columnIndex, $rowIndex) {
//            if ($column->getTitle() == 'Acciones') {
//                return [
//                    'default' => true,
//                    'class' => 'text-end',
//                ];
//            }
//
//            return ['default' => true];
//        });


    }

    public function actions(): array
    {
        return [
            Action::make('Crear')
                ->setIcon("fas fa-plus")
                ->setWireAction("wire:click")
                ->setWireActionDispatchParams("'openModal', { component: 'funciones.funciones-create' }"),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->searchable()
                ->sortable(),
            Column::make('Acciones')
                ->setLabelAttributes(['class' => 'text-end'])
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

    #[On('refreshfunciones')]
    public function builder(): Builder {
        return Funcion::query();
    }
    public function editar($id)
    {
        $this->dispatch('openModal',  'funciones.funciones-edit',['id' => $id]);

    }
    public function eliminar($id)
    {
        try {
            $grupo = Funcion::findOrFail($id);
            $grupo->delete();


            flash()->success('Eliminado correctamente',[],'Funcion');
        }catch (Exception $e) {
            flash()->error('Error: ',[],'Funcion');
            //echo "Error: " . $e->getMessage();
        }

    }
}

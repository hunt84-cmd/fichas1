<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TipoPrograma;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Exception;
use Rappasoft\LaravelLivewireTables\Views\Action;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class TipoProgramasTable extends DataTableComponent
{
    protected $model = TipoPrograma::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setActionsInToolbarEnabled();
    }

    public function actions(): array
    {
        return [
            Action::make('Crear')
                ->setIcon('fas fa-plus')
                ->setWireAction('wire:click')
                ->setWireActionDispatchParams("'openModal', { component: 'tipo-programas.tipo-programa-create' }")
        ];
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

    #[On('refreshtipoprog')]
    public function builder(): Builder
    {
        return TipoPrograma::query();
    }

    public function editar($id)
    {
        $this->dispatch('openModal',  'tipo-programas.tipo-programa-edit',["id" => $id]);
    }

    public function eliminar($id)
    {
        try {
            $item = TipoPrograma::findOrFail($id);
            $item->delete();
            flash()->success('Eliminado ',[],'Tipo Programa');
        } catch (Exception $e) {
            flash()->error('Error: ',[],'Tipo Programa');
        }
    }
}

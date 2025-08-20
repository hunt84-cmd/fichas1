<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Emisora;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\Views\Action;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class EmisorasTable extends DataTableComponent
{
    protected $model = Emisora::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setActionsInToolbarEnabled();
    }

    public function actions(): array
    {
        return [
            Action::make('Crear')
                ->setIcon("fas fa-plus ")
                ->setWireAction("wire:click")
                ->setWireActionDispatchParams("'openModal', { component: 'emisoras.emisora-create' }")
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
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

    #[On('refreshemisoras')]
    public function builder(): Builder
    {
        return Emisora::query();
    }

    public function editar($id)
    {
        $this->dispatch('openModal',  'emisoras.emisora-edit',["id" => $id]);
    }

    public function eliminar($id)
    {
        try {
            $item = Emisora::findOrFail($id);
            $item->delete();
            flash()->success('Eliminado ',[],'Emisora');
        } catch (Exception $e) {
            flash()->error('Error: ',[],'Emisora');
        }
    }
}

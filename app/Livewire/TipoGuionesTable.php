<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TipoGuion;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Action;
use Livewire\Attributes\On;
use Exception;

class TipoGuionesTable extends DataTableComponent
{
    protected $model = TipoGuion::class;

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
                ->setWireActionDispatchParams("'openModal', { component: 'tipoguiones.tipoguion-create' }")
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

    #[On('refreshtipoguiones')]
    public function builder(): Builder
    {
        return TipoGuion::query();
    }

    public function editar($id)
    {
        $this->dispatch('openModal',  'tipoguiones.tipoguion-edit',["id" => $id]);
    }

    public function eliminar($id)
    {
        try {
            $item = TipoGuion::findOrFail($id);
            $item->delete();
            flash()->success('Eliminado ',[],'Tipo Guion');
        } catch (Exception $e) {
            flash()->error('Error: ',[],'Tipo Guion');
        }
    }
}

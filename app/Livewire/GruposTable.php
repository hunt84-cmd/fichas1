<?php

namespace App\Livewire;

use Exception;
use Flux\Flux;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Action;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Grupo;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn as CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;


class GruposTable extends DataTableComponent
{
    protected $model = Grupo::class;
    protected $red="no";



    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setActionsInToolbarEnabled();
        $this->setActionWrapperAttributes([
            'style' => 'padding: 0.1rem !important;'
        ]);
    }
    public function actions(): array
    {
        return [
            Action::make('Crear')
                ->setIcon("fas fa-plus ")
                ->setWireAction("wire:click")
                ->setWireActionDispatchParams("'openModal', { component: 'grupos.grupo-create' }"),
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
            CountColumn::make('Cantidad programas')
                ->setDataSource('tipos')
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
     #[On('refreshgrupos')]
    public function builder(): Builder {
        return Grupo::query();
    }
    public function editar($id)
    {
        $this->dispatch('openModal',  'grupos.grupo-edit',['id' => $id]);

    }
    public function eliminar($id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->delete();


            flash()->success('Eliminado ',[],'Grupo');
        }catch (Exception $e) {
            flash()->error('Error: ',[],'Grupo');
            //echo "Error: " . $e->getMessage();
        }

    }
}

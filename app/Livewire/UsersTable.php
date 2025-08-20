<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
//            ->setReorderEnabled()
            ->setSingleSortingDisabled()
//            ->setHideReorderColumnUnlessReorderingEnabled()
//            ->setFilterLayoutSlideDown()
//            ->setRememberColumnSelectionDisabled()
            ->setSecondaryHeaderTrAttributes(function($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setSecondaryHeaderTdAttributes(function(Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }

                return ['default' => true];
            })
            ->setFooterTrAttributes(function($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function(Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setUseHeaderAsFooterEnabled();
//            ->setHideBulkActionsWhenEmptyEnabled();

        $this->setBulkActionConfirmMessages([
            'deactivate' => 'Are you sure you want to delete these items?',
        ]);


    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Usuario", "username")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Rol", "rol.nombre")
                ->sortable(),
            ButtonGroupColumn::make('')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                    ->title(fn($row) => 'View ')
                        ->location(fn($row) => route('usuarios', $row))
                        ->attributes(function($row) {
                            return [
                                'icon' => 'pencil-square',
                                'class' => 'btn btn-primary btn-sm',
                            ];
                        }),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit ' )
                        ->location(fn($row) => route('usuarios', $row))
                        ->attributes(function($row) {
                            return [
                                'target' => '_blank',
                                'class' => 'btn btn-secondary btn-sm',
                            ];
                        }),
                ]),

        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Roles', 'rol_id')
                ->setFilterPillTitle('Roles')
                ->options([
                    ''    => 'Todos',
                    '1' => 'Admin',
                    '2'  => 'Emisora',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->whereLike('rol_id',1);
//                        whereNotNull('email_verified_at');
                    } elseif ($value === '2') {
                        $builder->whereLike('rol_id',2);
                    }
                }),


            DateFilter::make('Verified From')
                ->config([
                    'min' => '2020-01-01',
                    'max' => '2021-12-31',
                ])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '>=', $value);
                }),
            DateFilter::make('Verified To')
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('email_verified_at', '<=', $value);
                }),
        ];
    }
}

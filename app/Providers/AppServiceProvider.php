<?php

namespace App\Providers;

use Filament\Actions\MountableAction;
use Filament\Forms\Components\Component;
use Filament\Infolists\Components\Component as InfolistComponent;
use Filament\Tables\Columns\Column;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Component::configureUsing(function (Component $component) {
            $component
                ->translateLabel();
        });

        InfolistComponent::configureUsing(function (InfolistComponent $component) {
            $component
                ->translateLabel();
        });

        MountableAction::configureUsing(function (MountableAction $action) {
            $action
                ->translateLabel();
        });

        Column::configureUsing(function (Column $column) {
            $column
                ->translateLabel();
        });
    }
}

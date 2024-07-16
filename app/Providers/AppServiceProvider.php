<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kanban\Domain\Repository\BoardRepository;
use Kanban\Domain\Repository\CardRepository;
use Kanban\Domain\Repository\ColumnRepository;
use Kanban\Infra\Repository\BoardRepositoryQueryBuilder;
use Kanban\Infra\Repository\CardRepositoryQueryBuilder;
use Kanban\Infra\Repository\ColumnRepositoryQueryBuilder;

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
        $this->app->bind(
            BoardRepository::class,
            BoardRepositoryQueryBuilder::class
        );
        $this->app->bind(
            ColumnRepository::class,
            ColumnRepositoryQueryBuilder::class
        );
        $this->app->bind(
            CardRepository::class,
            CardRepositoryQueryBuilder::class
        );
    }
}

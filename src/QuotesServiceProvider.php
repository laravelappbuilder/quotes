<?php

namespace Quotes;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class QuotesServiceProvider extends ServiceProvider
{

  public function boot()
  {
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    $this->loadViewsFrom(__DIR__.'/resources/views/quotes','quotes');

    $this->publishes([
        __DIR__.'/resources/views' => resource_path('views/'),
    ]);
    $this->publishes([
        __DIR__.'/database/migrations' => database_path('migrations/')
    ]);
    $this->publishes([
        __DIR__.'/json' => storage_path('quotes/')
    ]);

  }

  public function register()
  {

  }
}

<?php
namespace Chicorycom;


use Chicorycom\App\Encryption;
use Illuminate\Support\ServiceProvider;

class EncryptServiceProvider extends ServiceProvider
{


    /**
     * @return :void
     */
    public function boot()
    {
        $source = realpath($raw = __DIR__.'/../config/chencrypt.php') ?: $raw;
        $this->mergeConfigFrom(
            $source, 'chencrypt'
        );
        $this->publishes([$source => config_path('chencrypt.php')]);
    }



    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Encryption::class, function ($app) {
            return new Encryption();
        });
    }
}

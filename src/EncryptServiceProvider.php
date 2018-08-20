<?php
namespace Chicorycom;


use Chicorycom\App\Encryption;
use Illuminate\Support\ServiceProvider;

class EncryptServiceProvider extends ServiceProvider
{


    /**
     * @return :void
     */
    public function boot():void
    {
        $source = realpath($raw = __DIR__.'/../config/chencrypt.php') ?: $raw;
        $this->mergeConfigFrom(
            $source, 'chencrypt'
        );

        $this->publishes([$source => config_path('chencrypt.php')]);

        $config = $this->app['config']['chencrypt'];
        $this->app->bind(Encryption::class, $config['encrypt']);
    }



    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register():void
    {

    }
}

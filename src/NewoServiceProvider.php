<?php

namespace Newo\Sdk;

use Illuminate\Support\ServiceProvider;
use OnestoIt\Sdk\OnestoServiceProvider;

/**
 * Provider di compatibilità.
 *
 * Tutto il lavoro vero è fatto da OnestoServiceProvider (binding 'onesto',
 * publish config). Qui ci limitiamo a:
 *  - assicurarci che il provider nuovo sia registrato (auto-discovery lo fa
 *    già, ma chi lo elenca a mano in config/app.php deve ottenere comunque
 *    un sistema funzionante con il solo NewoServiceProvider).
 *  - alias del container 'newo' -> 'onesto', così la vecchia Facade `Newo`
 *    continua a risolvere.
 */
class NewoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Registra l'SDK nuovo se non lo è già.
        if (! $this->app->providerIsLoaded(OnestoServiceProvider::class)) {
            $this->app->register(OnestoServiceProvider::class);
        }

        // Vecchio binding container 'newo' = nuovo 'onesto'.
        $this->app->alias('onesto', 'newo');

        // Vecchia classe Newo\Sdk\Newo = nuova OnestoIt\Sdk\Onesto.
        $this->app->alias('onesto', Newo::class);
    }

    public function boot(): void
    {
        // niente — il publishing del config lo fa OnestoServiceProvider.
    }

    /**
     * Compatibilità per Laravel < 11 dove providerIsLoaded() non esiste.
     */
    protected function providerIsLoaded(string $provider): bool
    {
        return method_exists($this->app, 'providerIsLoaded')
            ? $this->app->providerIsLoaded($provider)
            : array_key_exists($provider, $this->app->getLoadedProviders());
    }
}

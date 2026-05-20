<?php

namespace Newo\Sdk;

use Illuminate\Support\ServiceProvider;
use OnestoIt\Sdk\OnestoServiceProvider;

/**
 * Provider di compatibilità per il vecchio nome del pacchetto.
 *
 * Tutto il lavoro vero è fatto da OnestoServiceProvider (binding 'onesto',
 * publish del config). Qui ci limitiamo a:
 *  - registrare il provider del nuovo SDK se non l'ha già fatto l'auto-discovery
 *    (necessario per chi elenca a mano questo provider in config/app.php);
 *  - mappare i vecchi alias del container `'newo'` e `Newo\Sdk\Newo::class` sul
 *    nuovo binding `'onesto'`, così la vecchia Facade `Newo` continua a
 *    risolvere allo stesso oggetto;
 *  - leggere le vecchie env legacy come fallback se quelle nuove non sono
 *    valorizzate (token / base url), così chi aggiorna solo il pacchetto e
 *    non tocca il `.env` non si rompe.
 */
class NewoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Registra il provider del nuovo SDK se non è già stato caricato.
        if (! $this->app->providerIsLoaded(OnestoServiceProvider::class)) {
            $this->app->register(OnestoServiceProvider::class);
        }

        // Fallback env legacy: solo se la versione nuova non è settata.
        $config = $this->app['config'];

        if (! $config->get('onesto.token') && ($legacyToken = env('NEWO_TOKEN'))) {
            $config->set('onesto.token', $legacyToken);
        }

        if (! env('ONESTO_URL') && ($legacyUrl = env('NEWO_URL'))) {
            $config->set('onesto.url', $legacyUrl);
        }

        // Alias del container: 'newo' e Newo\Sdk\Newo::class risolvono sul
        // singleton 'onesto'.
        $this->app->alias('onesto', 'newo');
        $this->app->alias('onesto', Newo::class);
    }

    public function boot(): void
    {
        // niente — il publishing del config lo fa OnestoServiceProvider.
    }
}

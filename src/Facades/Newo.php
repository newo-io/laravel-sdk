<?php

namespace Newo\Sdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade di compatibilità — risolve il binding `'onesto'` del container,
 * cioè la stessa istanza usata da `OnestoIt\Sdk\Facades\Onesto`.
 *
 * @method static array|null createInvoiceManually(array $data)
 * @method static array|null createInvoiceFromPIVA(array $data)
 *
 * @deprecated Usa OnestoIt\Sdk\Facades\Onesto (alias `Onesto`).
 */
class Newo extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'onesto';
    }
}

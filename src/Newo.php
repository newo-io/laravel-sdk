<?php

namespace Newo\Sdk;

use OnestoIt\Sdk\Onesto;

/**
 * Classe di compatibilità.
 *
 * Era la classe client del vecchio SDK `newo-io/laravel-sdk`. Ora è solo un
 * sottotipo della nuova `OnestoIt\Sdk\Onesto`, così:
 *
 *   - `new \Newo\Sdk\Newo()` continua a funzionare
 *   - i metodi `createInvoiceManually()` / `createInvoiceFromPIVA()` sono
 *     ereditati intatti
 *   - eventuali `instanceof Newo\Sdk\Newo` nei consumer restano veri
 *
 * @deprecated Usa OnestoIt\Sdk\Onesto.
 */
class Newo extends Onesto
{
}

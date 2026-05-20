# Newo Laravel SDK — DEPRECATO

> ⚠️ Questo pacchetto è **deprecato**. Onesto.it si chiamava prima Newo. Il pacchetto è ora distribuito come [`onesto-it/laravel-sdk`](https://packagist.org/packages/onesto-it/laravel-sdk).
>
> `newo-io/laravel-sdk` resta su Packagist solo come **metapackage di compatibilità**: installarlo equivale a installare `onesto-it/laravel-sdk` e mantiene attivi i vecchi nomi (`Newo::`, `Newo\Sdk\…`, `NEWO_TOKEN`).

## Cosa devi fare

### Non hai tempo / non vuoi toccare nulla

Aggiorna semplicemente:

```bash
composer require newo-io/laravel-sdk:^1.1
```

Il tuo codice continua a funzionare uguale: `Newo::createInvoiceManually(...)`, `Newo::createInvoiceFromPIVA(...)`, env `NEWO_TOKEN`, tutto resta valido.

### Vuoi pulire (consigliato)

```bash
composer remove newo-io/laravel-sdk
composer require onesto-it/laravel-sdk
```

Poi nel codice:

| Prima | Dopo |
|---|---|
| `use Newo;` | `use Onesto;` |
| `Newo::createInvoiceManually(...)` | `Onesto::createInvoiceManually(...)` |
| `Newo\Sdk\Newo` | `OnestoIt\Sdk\Onesto` |
| env `NEWO_TOKEN` | env `ONESTO_TOKEN` |
| env `NEWO_URL` | env `ONESTO_URL` |

Il nuovo SDK legge comunque `NEWO_TOKEN` come fallback, quindi puoi anche aggiornare il codice prima e le env dopo.

## Documentazione

Vedi [Onesto-it/laravel-sdk](https://github.com/Onesto-it/laravel-sdk).

## Licenza

MIT

# Changelog

## [1.1.0] — 2026-05-20

### Cambiato
- ⚠️ **Pacchetto rinominato in `onesto-it/laravel-sdk`** (cambio brand Newo → Onesto.it).
- Questa versione è un **metapackage di compatibilità**: `require` `onesto-it/laravel-sdk` ed espone shim per `Newo::`, `Newo\Sdk\Newo`, `Newo\Sdk\NewoServiceProvider`, `Newo\Sdk\Facades\Newo`. Il codice esistente continua a funzionare senza modifiche.
- Env `NEWO_TOKEN` / `NEWO_URL` restano supportate come fallback.

### Deprecato
- L'intero namespace `Newo\Sdk\…` e la facade `Newo` — usa `OnestoIt\Sdk\…` e `Onesto::`.

## [1.0.2] — 2025-07-07
- Ultima release del vecchio SDK monolitico. Vedi git history.

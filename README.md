# Newo Laravel SDK

Pacchetto Laravel per integrare le API di fatturazione di [Newo](https://newo.io).

## ✅ Installazione

1. Aggiungi nel `composer.json` del tuo progetto Laravel:

```json
"repositories": [
  {
    "type": "path",
    "url": "packages/newo/sdk"
  }
]
```

2. Installa il pacchetto:

```bash
composer require newo-io/laravel-sdk:dev-main
```

3. Pubblica il file di configurazione:

```bash
php artisan vendor:publish --tag=newo-config
```

---

## ⚙️ Configurazione

Nel tuo file `.env` aggiungi:

```env
NEWO_TOKEN=la_tua_api_key
NEWO_URL=https://api.newo.dev
NEWO_COMPANY_ID=la_tua_company_uuid
```

---

## 🚀 Utilizzo

Creazione fattura manuale:

```php
use Newo;

Newo::createInvoiceManually([
    'cliente' => [...],
    'articoli' => [...],
    'scadenze' => [...],
    // Altri campi...
]);
```

Creazione fattura da Partita IVA:

```php
Newo::createInvoiceFromPIVA([
    'piva' => '01234567890',
    'numerazione' => 'Standard',
    'issue_date' => '2025-07-07',
    'tipo_documento' => 'TD01',
    'metodo_pagamento' => 'Bonifico',
    'articoli' => [...],
    'scadenze' => [...],
    'invia_sdi' => true
]);
```

Per la struttura completa dei payload, fai riferimento alla [documentazione API Newo](https://api.newo.dev).

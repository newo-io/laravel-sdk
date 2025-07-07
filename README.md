# Newo Laravel SDK

Pacchetto Laravel per integrare le API di fatturazione di [Newo](https://newo.io).

## ✅ Installazione

1. Installa il pacchetto:

```bash
composer require newo-io/laravel-sdk
```

---

## ⚙️ Configurazione

Nel tuo file `.env` aggiungi:

```env
NEWO_TOKEN=la_tua_api_key
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

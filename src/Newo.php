<?php

namespace Newo\Sdk;

use Illuminate\Support\Facades\Http;

class Newo
{
    protected function post(string $endpoint, array $data)
    {
        return Http::withToken(config('newo.token'))
            ->acceptJson()
            ->post(config('newo.url') . $endpoint, $data)
            ->json();
    }

    public function createInvoiceManually(array $data)
    {
        return $this->post('/fatture/nuova/manuale', $data);
    }

    public function createInvoiceFromPIVA(array $data)
    {
        return $this->post('/fatture/nuova/piva', $data);
    }
}
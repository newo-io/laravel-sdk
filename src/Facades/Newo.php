<?php

namespace Newo\Sdk\Facades;

use Illuminate\Support\Facades\Facade;

class Newo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'newo';
    }
}
<?php

namespace Jason;

use Illuminate\Support\Facades\Facade;

class Chain33 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Chain33\Application::class;
    }
}

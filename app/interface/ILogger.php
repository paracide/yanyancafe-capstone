<?php

namespace App\interface;

interface ILogger
{

    public function write($event);

    public function getLast10(): array;

}

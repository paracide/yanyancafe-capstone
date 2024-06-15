<?php

namespace App\service;

interface ILogger
{

    public function write($event);

    public function getLast(): array;

}

<?php

namespace App\Factories;

interface FactoryInterface
{
    public function setNext(FactoryInterface $next);

    public function handle($data = null);

    public function next($data = null);
}
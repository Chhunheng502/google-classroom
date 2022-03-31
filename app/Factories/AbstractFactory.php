<?php

namespace App\Factories;

abstract class AbstractFactory implements FactoryInterface
{
    protected $next;

    public function setNext(FactoryInterface $next)
    {
        $this->next = $next;
    }

    public function next($data = null)
    {
        if ($this->next) {
            return $this->next->handle($data);
        }
    }
}
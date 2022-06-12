<?php

namespace App\Http\RequestFilters;

use App\Contracts\RequestFilterInterface;

abstract class AbstractRequestFilter implements RequestFilterInterface
{
    protected $request;

    protected $except = [];

    protected $only = [];

    public function __construct()
    {
        $this->request = request();
    }

    public function except(array $except = []): array
    {
        return $this->request->except($this->except ?? $except);
    }

    public function only(array $only = []): array
    {
        return $this->request->only($this->only ?? $only);
    }

    /**
     * @return array
     */
    public function getExcept(): array
    {
        return $this->except;
    }

    /**
     * @param array $except
     */
    public function setExcept(array $except): void
    {
        $this->except = $except;
    }

    /**
     * @return array
     */
    public function getOnly(): array
    {
        return $this->only;
    }

    /**
     * @param array $only
     */
    public function setOnly(array $only): void
    {
        $this->only = $only;
    }
}

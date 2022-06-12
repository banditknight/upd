<?php

namespace App\Traits;

trait FormRequestAttributes
{
    /** @var bool $auth */
    protected $auth = true;

    /** @var array $rules */
    protected $rules = [];

    /** @var array $allowedMethod */
    protected $allowedMethod = ['store', 'update'];

    /** @var array $messages */
    protected $messages = [];

    /**
     * @return bool
     */
    public function isAuth(): bool
    {
        return $this->auth;
    }

    /**
     * @param bool $auth
     */
    public function setAuth(bool $auth): void
    {
        $this->auth = $auth;
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     */
    public function setRules(array $rules): void
    {
        $this->rules = $rules;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
    }

    /**
     * @return array
     */
    public function getAllowedMethod(): array
    {
        return $this->allowedMethod;
    }

    /**
     * @param array $allowedMethod
     */
    public function setAllowedMethod(array $allowedMethod): void
    {
        $this->allowedMethod = $allowedMethod;
    }
}

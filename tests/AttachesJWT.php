<?php

use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AttachesJWT
{
    /**
     * @var User
     */
    protected $loginUser;

    /**
     * @param \App\Models\v1\User $user
     *
     * @return $this
     */
    public function loginAs(\App\Models\v1\User $user)
    {
        $this->loginUser = $user;

        return $this;
    }

    /**
     * @return string
     */
    protected function getJwtToken(): ?string
    {
        return is_null($this->loginUser) ? null : JWTAuth::fromUser($this->loginUser);
    }

    /**
     * Call the given URI and return the Response.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $parameters
     * @param  array  $cookies
     * @param  array  $files
     * @param  array  $server
     * @param  string  $content
     * @return Response
     */
    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        if ($this->requestNeedsBearerToken($method, $uri)) {
            $server = $this->attachToken($server);
        }

        return parent::call($method, $uri, $parameters, $cookies, $files, $server, $content);
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @return bool
     */
    protected function requestNeedsBearerToken(string $method, string $uri): bool
    {
        $resolverSuffixRouteNameByMethod = null;

        switch ($method) {
            case 'GET' :
                $resolverSuffixRouteNameByMethod = 'index';
            break;
            case 'POST' :
                $resolverSuffixRouteNameByMethod = 'store';
            break;
            case 'PUT' :
                $resolverSuffixRouteNameByMethod = 'update';
            break;
            case 'DELETE' :
                $resolverSuffixRouteNameByMethod = 'destroy';
            break;
            default:
                $resolverSuffixRouteNameByMethod = 'index';
        }

        return true;
    }

    /**
     * @param array $server
     *
     * @return array
     */
    protected function attachToken(array $server): array
    {
        return array_merge($server, $this->transformHeadersToServerVars([
            'Authorization' => 'Bearer ' . $this->getJwtToken(),
            'x-app-key' => 'Lorem'
        ]));
    }
}

<?php

namespace Woolf\Carter\Http\Middleware;

use Closure;
use Shopify;
use Woolf\Shophpify\Resource\OAuth;

class Authenticate
{
    protected $oauth;

    public function __construct(OAuth $oauth)
    {
        $this->oauth = $oauth;
    }

    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            $redirect = $this->oauth->authorizationUrl(
                config('carter.shopify.client_id'),
                implode(',', config('carter.shopify.scopes')),
                route('shopify.login'),
                session('state')
            );

            return view('carter::shopify.redirect_escape_iframe', compact('redirect'));
        }

        return $next($request);
    }
}
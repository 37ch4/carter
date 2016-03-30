<?php

namespace Woolf\Carter\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Woolf\Carter\RegisterShop;

class VerifyChargeAccepted
{

    protected $store;

    protected $auth;

    public function __construct(RegisterShop $store, Guard $auth)
    {
        $this->store = $store;

        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $user = $this->auth->user();

        if (! $user->charge_id || ! $this->store->hasAcceptedCharge($user->charge_id)) {
            return view('carter::shopify.auth.charge', [
                'redirect' => $this->store->charge()->getTargetUrl()
            ]);
        }

        return $next($request);
    }
}
<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\ConnectionInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Custom authentication based on request ip adress and api token.
        Auth::viaRequest('custom-api', function (Request $request) {
            $ip = $request->ip();
            $token = $request->token;
            $match = ['token' => $token, 'ip_adress' => $request->ip()];
            return ConnectionInterface::where($match)->first();
        });
    }
}

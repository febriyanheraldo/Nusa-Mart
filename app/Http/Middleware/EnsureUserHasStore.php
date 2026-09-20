<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasStore
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user && $user->role === 'seller' && !$user->store) {
            return redirect()->route('seller.store.create')
                ->with('warning', 'Anda harus membuat toko terlebih dahulu sebelum mengakses dashboard seller.');
        }

        return $next($request);
    }
}

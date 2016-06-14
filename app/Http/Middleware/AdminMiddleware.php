<?php namespace App\Http\Middleware;

use Closure;
use \Auth;
use App\Models\User;

class AdminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::guest()) {
            return redirect()->guest('/login');
        } else {
            $user = Auth::user();
            /* @var User $user */
            if (!$user->isAdmin()) {
                return redirect()->guest('//');
            }
        }

        return $next($request);


    }
}

<?php namespace App\Http\Middleware;

use Closure;
use \Auth;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;

class Researcher {


    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if (Auth::guest()) {
            return redirect()->guest('/auth/login');
        } else {
            $user = Auth::user();
            /* @var User $user */
            if (!$user->is('researcher')) {
                return redirect()->guest('//');
            }
        }

        return $next($request);

    }

}

<?php

namespace Passport\Middleware;

use Passport\Traits\HashesIds;
use Closure;

class ClientHashId
{

    use HashesIds;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->offsetExists('client_id')) {

            $client_id = $request->offsetGet('client_id');

            // Remove this "if" statement, if you do not want to allow the integer client_ids.
            //if ( ! is_numeric( $client_id ) ) {

            $result = $this->decode($client_id);
            if (count($result) > 0) {
                $request->offsetSet('client_id', $result[0]);
            } else {
                $request->offsetSet('client_id', -1);
            }
            //}
        }
        return $next($request);
    }
}

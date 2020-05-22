<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Response;
class adminDocente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$admin,$docente)
    {
        $usuarioActual=\Auth::user();
        if($admin==1){
            $x='ADMIN';
        }
        if($docente==2){
            $y='DOCENTE';
        }
        
        if($usuarioActual->tipo==$x || $usuarioActual->tipo==$y && \Auth::check())
        {
           // return Response::json($admin);
            return $next($request);
        }
        /*else if($usuarioActual->cargo==2 && \Auth::check()){
             return $next($request);
        }
      */

        return redirect('/home');
    }
}

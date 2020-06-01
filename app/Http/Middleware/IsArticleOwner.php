<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use App\Article;

class IsArticleOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->id == Article::find($request->route('article'))->user_id)
        {
            return $next($request);
        }
        else 
        {
            return redirect()->route('notenoughpermissions');
        }
    }
}

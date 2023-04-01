<?php

namespace App\Http\Middleware;

use App\Mensalidade;
use Closure;

class CheckMensalidadesPagasMiddleware
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
        //dd($request->matricula);
        $mensalidadePagas = Mensalidade::where('id_matricula', $request->matricula->id);
        $mensalidadePagas = $mensalidadePagas->whereIn('situacao', [Mensalidade::SITUACAO_PAGA, Mensalidade::SITUACAO_POR_CONTA]);
        $temMesalidadesPagas = ($mensalidadePagas->get()->count() > 0);
        if ($temMesalidadesPagas) {
            return redirect()->back()->with('danger', 'Ação não pode ser realizada. Matrícula tem mensalidade paga');
        }
        return $next($request);
    }
}

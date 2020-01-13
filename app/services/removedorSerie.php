<?php
namespace App\services;

use App\{serie, Episodio, Temporada};
use Illuminate\Support\Facades\DB;

class removedorSerie
{
    public function removerserie(int $id)
    {
        $nome = '';
        DB::transaction(function () use($id, &$nome)
        {
            $serie = serie::find($id);
            $nome = $serie->nome;
            $this->remover_temporada($serie);
            $serie->delete();
            
        });
    }

    /**
     * @param $serie
     */
    private function remover_temporada(serie $serie)
    {
        $serie->temporadas->each(function(Temporada $temporada){
            $this->remover_episodios($temporada);
            $temporada->delete();
        });
    }

    /**
     * @param Temporada $temporada
     */
    private function remover_episodios(Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio)
        {
            $episodio->delete();
        });
    }
}

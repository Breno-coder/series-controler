<?php
namespace App\services;

use App\{serie, Temporada};
use Illuminate\Support\Facades\DB;

class criadorSeries
{
    public function criarserie(string $nome, int $qtd_temporadas, int $ep_temporada):serie
    {
        DB::beginTransaction();
        $serie = serie::create([
            'nome'=>$nome
        ]);
        $this->criartemporadas($serie, $qtd_temporadas,$ep_temporada);
        DB::commit();
        return $serie;
    }

    /**
     * @param $serie
     */
    private function criartemporadas(serie $serie, $qtd_temporadas,$ep_temporada)
    {            
        for ($i=1; $i <= $qtd_temporadas; $i++) 
        { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarep($ep_temporada, $temporada);
        }
    }

    /**
     * @param ep_temporada
     * @param Illuminate\Database\Eloquent\Model $temporada
     */
    private function criarep($ep_temporada, $temporada)
    {
        for ($j=1; $j <= $ep_temporada; $j++) 
        { 
            $temporada->episodios()->create(['numero'=>$j]);
        }
    }
}

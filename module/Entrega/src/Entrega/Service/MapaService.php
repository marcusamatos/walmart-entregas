<?php

namespace Entrega\Service;

use Doctrine\ORM\EntityManager;
use Entrega\Entity\Mapa;
use Entrega\Entity\Rota;

class MapaService
{

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function criarMapa($nome, $mapa_string)
    {
        // Zerar mapas
        $mapaRepository = $this->em->getRepository('Entrega\Entity\Mapa');
        $rotaRepository = $this->em->getRepository('Entrega\Entity\Rota');

        foreach ($rotaRepository->findAll() as $rota) {
            $this->em->remove($rota);
        }
        foreach ($mapaRepository->findAll() as $mapa) {
            $this->em->remove($mapa);
        }
        $this->em->flush();


        // Inserir novo mapa
        $mapa = new Mapa();
        $mapa->setNome($nome);

        $this->em->persist($mapa);

        $linhas = explode("\n", trim($mapa_string));

        foreach ($linhas as $linha) {

            $colunas = explode(" ", trim($linha));

                $rota = new Rota();
                $rota->setOrigem($colunas[0]);
                $rota->setDestino($colunas[1]);
                $rota->setDistancia($colunas[2]);
                $rota->setMapa($mapa);
                $this->em->persist($rota);

        }

        $this->em->flush();
    }

    public function melhorRota($origem, $destino, $autonomia, $valorLitro){

        $results = [];
        $this->findRotes($origem, $destino, $results);

        if (!$results)
            return ['rota' => '', 'custo' => 0, 'status' => 'error', 'mensagem' => 'routa não encontrada!'];

        $rota = $results[0]['route'];
        $custo = ($results[0]['distancia'] / $autonomia) * $valorLitro;

        return array('rota' => $rota, 'custo' => $custo, 'status' => 'success', 'message' => '');
    }

    public function findRotes($origem, $destino, &$results, $caminho = '', $distancia = 0)
    {
        $caminho .= $origem . ' ';

        foreach($this->getAllRoutesByOrigem($origem) as $rota) {

            if ($rota->getDestino() == $destino) {

                $results[] = [
                    'route' => $caminho . $destino,
                    'distancia' => $distancia + $rota->getDistancia()
                ];

            } else {
                $this->findRotes($rota->getDestino(), $destino, $results, $caminho, $distancia + $rota->getDistancia());
            }
        }
    }

    protected function getAllRoutesByOrigem($origem)
    {
        $rotaRepository = $this->em->getRepository('Entrega\Entity\Rota');

        $rotas = $rotaRepository->findByOrigem($origem);

        return $rotas;

    }

}
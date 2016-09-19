<?php
/**
 * Created by PhpStorm.
 * User: marcusamatos
 * Date: 9/19/16
 * Time: 08:36
 */

namespace Entrega\Fixture;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Entrega\Entity\Mapa;
use Entrega\Entity\Rota;

class MapaFixture implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $mapa = new Mapa();
        $mapa->setNome('Mapa 1');
        $manager->persist($mapa);

        $rota = new Rota();
        $rota->setOrigem('A');
        $rota->setDestino('B');
        $rota->setDistancia(10);
        $rota->setMapa($mapa);
        $manager->persist($rota);

        $rota = new Rota();
        $rota->setOrigem('B');
        $rota->setDestino('D');
        $rota->setDistancia(15);
        $rota->setMapa($mapa);
        $manager->persist($rota);

        $rota = new Rota();
        $rota->setOrigem('A');
        $rota->setDestino('C');
        $rota->setDistancia(20);
        $rota->setMapa($mapa);
        $manager->persist($rota);

        $rota = new Rota();
        $rota->setOrigem('C');
        $rota->setDestino('D');
        $rota->setDistancia(30);
        $rota->setMapa($mapa);
        $manager->persist($rota);

        $rota = new Rota();
        $rota->setOrigem('B');
        $rota->setDestino('E');
        $rota->setDistancia(50);
        $rota->setMapa($mapa);
        $manager->persist($rota);

        $rota = new Rota();
        $rota->setOrigem('D');
        $rota->setDestino('E');
        $rota->setDistancia(30);
        $rota->setMapa($mapa);
        $manager->persist($rota);

        $manager->flush();



    }
}
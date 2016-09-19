<?php

namespace Entrega;

use Entrega\Service\MapaService;

return array(
    'router' => array(
        'routes' => array(
            'api-mapa' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/api/mapa',
                    'defaults' => array(
                        'controller' => 'Entrega\Controller\Mapa',
                        'action'     => 'create',
                    ),
                ),
            ),
            'api-best-route' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/api/rota',
                    'defaults' => array(
                        'controller' => 'Entrega\Controller\Mapa',
                        'action'     => 'bestRoute',
                    ),
                ),
            ),
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Entrega\Service\Mapa' => function($sm){
                $em = $sm->get('Doctrine\ORM\EntityMAnager');
                return new MapaService($em);
            }
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Entrega\Controller\Mapa' => 'Entrega\Controller\MapaController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'data-fixture' => array(
        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture',
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
        'fixture' => array(
            __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/'. __NAMESPACE__ .'/Fixture',
        )
    ),
);

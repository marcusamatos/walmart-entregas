<?php

namespace Entrega\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class MapaController extends AbstractActionController
{
    public function createAction()
    {
        // Erro caso o metodo nao seja post
        if(!$this->getRequest()->isPost())
            throw new \Exception('Method not allowed!');

        $mapaService = $this->getServiceLocator()->get('Entrega\Service\Mapa');

        $nome = $this->params()->fromPost('nome', null);
        $mapa = $this->params()->fromPost('mapa', null);

        try {
            $mapaService->criarMapa($nome, $mapa);
        } catch (\Exception $e) {
            return new JsonModel(array(
                'status' => 'error',
                'message' => $e->getMessage()
            ));
        }

        return new JsonModel(array(
            'status' => 'success'
        ));

        return $view;
    }

    public function bestRouteAction()
    {
        // Erro caso o metodo nao seja post
        if(!$this->getRequest()->isPost())
            throw new \Exception('Method not allowed!');

        $mapaService = $this->getServiceLocator()->get('Entrega\Service\Mapa');

        $origem = $this->params()->fromPost('origem', null);
        $destino = $this->params()->fromPost('destino', null);
        $autonomia = (float)$this->params()->fromPost('autonomia', null);
        $valor_litro = (float)$this->params()->fromPost('valor_litro', null);


        try {
            $resultado = $mapaService->melhorRota($origem, $destino, $autonomia, $valor_litro);

            return new JsonModel($resultado);
        } catch (\Exception $e) {
            return new JsonModel(array('status' => 'error', 'message' => $e->getMessage() ));
        }
    }
}
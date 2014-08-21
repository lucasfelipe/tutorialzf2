<?php
/**
 * namespace de localizacao do nosso controller
 */
namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HomeController extends AbstractActionController
{
    /**
     * action index
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
    
    /** 
    * Esta parte será responsável por renderizar a visão com o html referente.      
    * action index
    * @return \Zend\View\Model\ViewModel 
    */
    public function sobreAction(){
        return new ViewModel();
    }
}


<?php
/**
 * namespace de localizacao do nosso controller
 */
namespace Contato\Controller;

// import Zend\Mvc
use Zend\Mvc\Controller\AbstractActionController;

// import Zend\View
use Zend\View\Model\ViewModel;

// import Zend\Db
use Zend\Db\Adapter\Adapter as AdaptadorAlias,
    Zend\Db\Sql\Sql,
    Zend\Db\ResultSet\ResultSet;

class HomeController extends AbstractActionController
{
    /**
     * action index
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $table = new \Contato\Model\ContatoTable($this->getServiceLocator()->get('AdapterDb'));
        
        $table->fetchAll();
        /**
         * Função anônima para var_dump estilizado
         */
        $myVarDump = function($nome_linha = "Nome da Linha", $data = null, $caracter = ' - '){
            echo str_repeat($caracter, 100) . '<br />' . ucwords($nome_linha) . '<pre><br />';
            var_dump($data);
            echo '</pre>' . str_repeat($caracter, 100) . '<br /><br />';
        };
        
        /**
         * conexão com o banco
         */
        //$adapter = new \Zend\Db\Adapter\Adapter(array(
        //$adapter = new AdaptadorAlias(array(
        //   'driver'     => 'Pdo_Mysql',
        //    'database'  => 'agenda',
        //    'username'  => 'tutorialzf2',
        //    'password'  => 'root'
        //));
        $adapter = $this->getServiceLocator()->get('AdapterDb');
        
        /**
         * obter o nome do nosso schema do nosso banco.
         */
        $myVarDump(
                "nome Schema",
                $adapter->getCurrentSchema()
        );
        
        /**
         * contar quantidade de elementos da nossa tabela.
         */
        $myVarDump(
                "Quantidade elementos tabela contatos",
                $adapter->query("SELECT * FROM AGENDA_CONTATOS")->execute()->count()
        );
        
        /**
         * montar objeto sql e executar
         */
        //$sql        = new \Zend\Db\Sql\Sql($adapter);
        $sql        = new Sql($adapter);
        $select     = $sql->select()->from('agenda_contatos');
        $statement  = $sql->prepareStatementForSqlObject($select);
        $resultsSql = $statement->execute();
        $myVarDump(
                "Object SQL com SELECT executado",
                $resultsSql
        );
        
        /**
         * montar objeto resultset com objeto sql e mostrar resultado em array
         */
        //$resultSql = new \Zend\Db\ResultSet\ResultSet;
        $resultSql = new ResultSet;
        $resultSql->initialize($resultsSql);
        $myVarDump(
                "Resultado do Objeto SQL para Array",
                $resultSql->toArray()
        );
        die();
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


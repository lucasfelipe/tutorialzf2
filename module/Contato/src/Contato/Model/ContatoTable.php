<?php
// namespace de localização do nosso model
namespace Contato\Model;

// import Zend\Db
use //Zend\Db\Adapter\Adapter,
    //Zend\Db\ResultSet\ResultSet,
    Zend\Db\TableGateway\TableGateway;

class ContatoTable {
    protected $tableGateway;
    
    /**
     * Construtor com dependencia do Adapter do Banco
     * 
     * @param \Zend\Db\Adapter\Adapter $adapter
     
    public function __construct(Adapter $adapter) {
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Contato());
        
        $this->tableGateway = new TableGateway('agenda_contatos', $adapter, null, $resultSetPrototype);
    } */
    
    /**
     * Construtor com dependencia do TableGateway
     * 
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    /**
     * Recuperar todos os elementos da tabela contatos
     * 
     * @return ResultSet 
     */
    public function fetchAll(){
        return $this->tableGateway->select();
    }
    
    /**
     * Localizar linha especifico pelo id da tabela contatos
     * 
     * @param type $id 
     * @return \Model\Contato
     * @throws \Exception
     */
    public function find($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row)
            throw new \Exception ("Não foi encontrado contato de id = {$id}");
        return $row;
    }
}
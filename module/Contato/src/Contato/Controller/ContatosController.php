<?php
namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ContatosController extends AbstractActionController {
    // GET /contatos
    public function indexAction() {
        
    }
    
    // GET /contatos/novo
    public function novoAction(){
        
    }
    
    // POST /contatos/adicionar
    public function adicionarAction(){
        // obtém a requisição
        $request = $this->getRequest();
        
        // verifica se a requisição é do tipo POST
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;
            
            // verifica se o formulário segue a validação proposta
            if ($formularioValido){
                // aqui vai a logica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsavel pela adicao
                // 2- inserir dados no banco pelo model
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Contato criado com sucesso");
                
                // redirecionar para action index no controller contatos
                return $this->redirect()->toRoute('contatos');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao criar contato");
                
                // redirecionar para action novo controllers contatos
                return $this->redirect()->toRoute('contatos', array('action' => 'novo'));
            }
        }
    }
    
    // GET /contatos/detalhes/id
    public function detalhesAction(){
        // Filtra id passado pela url
        $id = (int) $this->params()->fromRoute('id', 0);
        
        // se id = 0 ou não informado redirecione para contatos
        if (!$id){
            // adicionar mensagem
            $this->flashMessenger()->addMessage("Contato não encontrado");
            
            // redirecionar para action index
            return $this->redirect()->toRoute('contatos');
        }
        
        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsavel pelo find
        // 2 - solicitar form com dados desse contato encontrado
        // formulario com dados preenchidos
        $form = array(
            'nome' => 'Lucas Felipe',
            'telefone_principal' => "(061) 9292-9292",
            'telefone_secundario' => "(061) 9292-9292",
            'data_criacao' => "19/08/2014",
            'data_atualizacao' => "19/08/2014"
        );
        
        // dados enviados para detalhes.phtml
        return array('id' => $id, 'form' => $form);
    }
    
    // GET /contatos/editar/id
    public function editarAction(){
         // Filtra id passado pela url
        $id = (int) $this->params()->fromRoute('id', 0);
        
        // se id = 0 ou não informado redirecione para contatos
        if (!$id){
            // adicionar mensagem
            $this->flashMessenger()->addMessage("Contato não encontrado");
            
            // redirecionar para action index
            return $this->redirect()->toRoute('contatos');
        }
        
        // aqui vai lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado.
        
        // formulário com dados preenchidos
        $form = array(
            'nome'  => 'Lucas Felipe',
            "telefone_principal"    => "(061) 9292-9292",
            "telefone_secundario"   => "(061) 9292-2929"
        );
        
        return array('id' => $id, 'form' => $form);
    }
    
    // PUT /contatos/editar/id
    public function atualizarAction(){
       // obtem a requisicao
       $request = $this->getRequest();
       
       // verifica se a requisição é do tipo POST
       if ($request->isPost()){
           // obter e armazenar valores do post
           $postData = $request->getPost()->toArray();
           $formularioValido = true;
           
           if ($formularioValido) {
               // aqui vai a logica para editar os dados à tabela no banco
               // 1 - solicitar serviço para pegar o model responsável pela atualização
               // 2 - editar dadso no banco pelo model
               
               // adicionar mensagem de sucesso
               $this->flashMessenger()->addSuccessMessage("Contato editado com sucesso!");
               
               // redirecionar para action detalhes
               return $this->redirect()->toRoute('contatos', array('action' => 'detalhes', "id" => $postData['id']));
           } else {
               // adicionar mensagem de sucesso
               $this->flashMessenger()->addErrorMessage("Erro ao editar contato");
               
               // redirecionar para action editar
               return $this->redirect()->toRoute("contatos", array('action' => 'editar', 'id' => $postData['id']));
           }
       }
    }
    
    // DELETE /contatos/deletar/id
    public function deletarAction(){
        // filtra id passado pela url
        $id = (int) $this->params()->fromRoute('id', 0);
        
        // se id = 0 ou não informado redirecione para contatos
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addMessage("Contato não encontrado");
        } else {
            // aqui vai a lógica para deletar o contato no banco
            // 1 - solicitar serviço para pegar o model responsavel pelo delete
            // 2 - deleta contato
            
            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("Contato de ID $id deletado com sucesso");
        }
        
        // redirecionar para action index
        return $this->redirect()->toRoute('contatos');
    }
}


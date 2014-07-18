<?php

class PessoasController extends AppController{
    public $name='Pessoas';
    public $layout='layoutPrincipalEmail';
    
  
       //funções de uso interno    
       
    //lista todas as pessoas registradas
    function lista(){
        return $this->Pessoa->lists();
    }
    
    function contaRegs(){
        return $this->Pessoa->conta();
    }
    
    
    
    //funções que renderizam alguma view
    
    
    
    
    function index(){
        $result= $this->contaRegs();
        
        $this->set('totalPessoas',$result);
    }
        
        
    function exibe(){
        $result=$this->lista();        
        $this->set('pessoas',$result);
    }
 
    //function exibepessoa que exibe os dados de 1 pessoa especifica
}


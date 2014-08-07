<?php

class PessoasController extends AppController{
    public $name='Pessoas';
    public $layout='layoutPrincipalEmail';
    
  
       //funções de uso interno    
       
    //retorna 1 especifica
    function listapessoa($pid=null){
        
        if($pid!=null){            
            return $this->Pessoa->buscapessoa($pid);   
        }
        
        return null;
        
    }
    
    //retorna todos os registros
     function listatudo(){
                  
       return $this->Pessoa->lists();   
                            
        
    }
    
    
    //"fatia" a lista de pessoas em varias partes
    //retorna uma parte da lista de pessoas cadastradas
    //o tamanho da lista retornada depende do divisor recebido
    function listarepartido($inicio=0,$divisor=1){//começa a partir do indice 0
        
        
       $regs=$this->Pessoa->lists();        
       return  array_slice($regs, $inicio,$divisor); 
                                   
        
    }
    
    
    
    function contaRegs(){
        return $this->Pessoa->conta();
    }
    
    
    
    
    
    //funções que renderizam alguma view
    
    
    
    
    function index(){
        $result= $this->contaRegs();
        
        $this->set('totalPessoas',$result);
    }
        
    //function exibepessoa que exibe os dados de 1 pessoa especifica    
    
    function exibe(){
        $result=$this->listatudo();        
        $this->set('pessoas',$result);
    }
 
 
}


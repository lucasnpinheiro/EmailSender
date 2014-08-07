<?php

class Pessoa extends AppModel{
    public $name='Pessoa';
    public $hasOne=array('Contato');
    


    
    //retorna todas as pessoas cadastradas
    public function lists(){        
        $result=$this->find('all');        
        return $result;
    }
    
    //retorna os dados de 1 pessoa a partir de seu id
     public function buscapessoa($pessoaid){
         
        $result=$this->find('all',array('conditions'=>array('Pessoa.id'=>$pessoaid)));   
        return $result;
    }
    
    
    
    //conta o número de pessoas cadastradsa
    public function conta(){
        $result=$this->find('count');        
        return $result;
    }


}
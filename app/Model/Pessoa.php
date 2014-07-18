<?php

class Pessoa extends AppModel{
    public $name='Pessoa';
    public $hasOne=array('Contato');
    


    
    //retorna todas as pessoas cadastradas
    public function lists(){        
        $result=$this->find('all');        
        return $result;
    }
    
    //conta o número de pessoas cadastradsa
    public function conta(){
        $result=$this->find('count');        
        return $result;
    }


}
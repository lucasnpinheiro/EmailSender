<h3>Novo email</h3>
<?php

//echo "its Alive !!!";
/*
echo  '</br></br>';
echo "Enviar para ".$this->Html->link("TODOS",'/messages/enviatudo/').'(com delay automatico)';
echo  '</br></br>';
echo "Enviar para ".$this->Html->link("TODOS",'/messages/enviarepartido/').'(pausa manual)';
echo  '</br></br>';
echo "Enviar para ".$this->Html->link("TODOS",'/messages/enviaaomesmotempo/')." (Compor email em massa)";
echo  '</br></br>';
*/

//FORMULARIO PARA ENVIO DE EMAIL

$pessoas=$this->requestAction("/pessoas/listatudo/");

echo $this->Form->create('message',array('action'=>'enviaaomesmotempo'));
    
    //opções de envio
    //echo "Enviar para: </br>";
    $opcoes = array('1' => 'Todos (pausa automatica)', '2' => 'Todos (pausa manual)', '3' => 'Individual');
            echo $this->Form->input(
            'Enviar para',
            array('options' => $opcoes, 'default' => '3')
        );    

       
    

    echo $this->Form->input(
            'Destinatario',
            array('options' => $pessoas, 'default' => 'todos')
        );    
            
    //echo $this->Form->input('destinatario', array('type' => 'file'));
    echo $this->Form->input('assunto');
    echo $this->Form->input('corpo', array('rows' => '3'));

    
    
    echo $this->Form->input('arquivo', array('type' => 'file'));
echo $this->Form->end('Enviar email');

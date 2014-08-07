<h3>Novo email</h3>
<?php

//echo "its Alive !!!";
echo  '</br></br>';
echo "Enviar para ".$this->Html->link("TODOS",'/messages/enviatudo/').'(com delay automatico)';
echo  '</br></br>';
echo "Enviar para ".$this->Html->link("TODOS",'/messages/enviarepartido/').'(pausa manual)';
echo  '</br></br>';
echo "Enviar para ".$this->Html->link("TODOS",'/messages/enviaaomesmotempo/')." (Compor email em massa)";
echo  '</br></br>';


//FORMULARIO PARA ENVIO DE EMAIL

echo $this->Form->create('message',array('action'=>'enviaaomesmotempo'));
    echo $this->Form->input('destinatario');
    echo $this->Form->input('assunto');
    echo $this->Form->input('corpo', array('rows' => '3'));
    $sizes = array('s' => 'Small', 'm' => 'Medium', 'l' => 'Large');
            echo $this->Form->input(
            'size',
            array('options' => $sizes, 'default' => 'm')
        );
    
    
    echo $this->Form->input('arquivo', array('type' => 'file'));
echo $this->Form->end('Enviar email');

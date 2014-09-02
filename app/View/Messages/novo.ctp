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

echo $this->Form->create('message',array('action'=>'picking'));
    
    //tipo de envio
    //todos ou individual   
    $tipoemails = array('1' => 'Todos (pausa automatica)', 
                        '2' => 'Todos (pausa manual)', 
                        '3' => 'Email Individual'
                        );
            
    echo $this->Form->input('tipoemail',
                array('options' => $tipoemails, 'default' => '1', 'label' => 'Tipo de Email')
        );    

    
   
    //tipo de anexo 
         
   //personalizado ou mesmo para todos    
    $tipoanexos = array('1' => 'Personalizado pelo CPF', 
                        '2' => 'Escolher Agora'
        );
        
           
    echo $this->Form->input('tipoanexo',
                array('options' => $tipoanexos, 'default' => '1', 'label' => 'Tipo de Anexo',)
        );   
    
    
    //usado quando não for enviar para todos        
//    echo $this->Form->input(
//            'destinatario',
//            array('options' => $pessoas, 'default' => 'todos')
//        );    
            
    //echo $this->Form->input('destinatario', array('type' => 'file'));
    echo $this->Form->input('assunto');
    echo $this->Form->input('corpo', array('rows' => '3'));

    
    
    echo $this->Form->input('arquivo', array('type' => 'file','label' => 'Arquivo (opcional)'));
echo $this->Form->end('Enviar email');

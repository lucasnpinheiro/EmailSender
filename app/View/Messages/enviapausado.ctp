<?php

//echo "its Alive !!!";

$tipoemail=$dadosemail['message']['tipoemail'];
$tipoanexo=$dadosemail['message']['tipoanexo'];
$assunto=$dadosemail['message']['assunto'];
$corpo=$dadosemail['message']['corpo'];
$arquivo=$dadosemail['message']['arquivo'];

$iniciado=true;
$novoinicio=$inicio;
        

echo $this->Form->create('message',array('action'=>'enviapausado'));
    echo $this->Form->input('tipoemail',array('type'=>'hidden','value'=>"$tipoemail"));
    echo $this->Form->input('tipoanexo',array('type'=>'hidden','value'=>"$tipoanexo"));
    echo $this->Form->input('assunto',array('type'=>'hidden','value'=>"$assunto"));
    echo $this->Form->input('corpo',array('type'=>'hidden','value'=>"$corpo"));
    echo $this->Form->input('arquivo',array('type'=>'hidden','value'=>"$arquivo"));    
    
    echo $this->Form->input('iniciado',array('type'=>'hidden','value'=>"$iniciado"));
    echo $this->Form->input('novoinicio',array('type'=>'hidden','value'=>"$novoinicio"));
echo $this->Form->end('Continuar enviando');




echo "</br></br>";

//debug($pessoas);
//debug($pessoas);
if(empty($pessoas)){
    echo "<br>fim ! \o/";
}
else{
    echo "emails enviados </br>:";


    foreach($pessoas as $pessoa){
        echo "ID: ".$pessoa['Pessoa']['id']."</br>";
        echo "Nome: ".$pessoa['Pessoa']['nome']."</br>";
        echo "CPF: ".$pessoa['Pessoa']['cpf']."</br>";
        echo "Email Principal: ".$pessoa['Contato']['emailprincipal']."</br>";
        echo $this->Html->link("Enviar email",'/messages/envia/'.$pessoa['Pessoa']['id']);


        echo "</br></br>";
    
    }
}



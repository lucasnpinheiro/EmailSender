<?php

//echo "its Alive !!!";

foreach($pessoas as $pessoa){
    echo "ID: ".$pessoa['Pessoa']['id']."</br>";
    echo "Nome: ".$pessoa['Pessoa']['nome']."</br>";
    echo "CPF: ".$pessoa['Pessoa']['cpf']."</br>";
    echo "Email Principal: ".$pessoa['Contato']['emailprincipal']."</br>";
    echo $this->Html->link("Enviar email",'/messages/envia/'.$pessoa['Pessoa']['id']);
    
    
    echo "</br></br>";
    
}

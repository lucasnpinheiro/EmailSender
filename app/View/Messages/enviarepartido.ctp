<?php

//echo "its Alive !!!";


echo "foram enviados $tamanho emails, continuar ?".$this->Html->link("Sim",'/messages/enviarepartido/'.$inicio);
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



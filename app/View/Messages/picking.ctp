<?php
    

echo "tipo de email foi $tipoemail</br>";

    if($tipoemail==1){
        
        echo "Emails enviados para todos de maneira automatica ! Confira sua caixa de saida";

    }
    else if($tipoemail==2){
            echo "foram enviados $tamanho emails, continuar ?".$this->Html->link("Sim",'/messages/enviapausado/'.$inicio);


    }
    else{
         echo "Email individual enviado !";


    }




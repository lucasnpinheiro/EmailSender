<?php

//echo "its Alive !!!";


echo "Compor Email em massa (todos os contatos) </br> ";


echo $this->Form->create('message',array('action'=>'enviaaomesmotempo'));
echo $this->Form->input('assunto');
echo $this->Form->input('corpo', array('rows' => '3'));
echo $this->Form->end('Enviar email');

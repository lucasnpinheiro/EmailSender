<?php

class EmailConfig{
    public $default = array(
        'transport' => 'Mail',
        'from' => 'you@localhost',
        //'charset' => 'utf-8',
        //'headerCharset' => 'utf-8',
    );
 
public $smtp = array(
    'transport' => 'Smtp',
    'from' => array('XXXXXXXXX@gmail.com' => 'SEU NOME'), //<-----EDITAR AQUI
    'host' => 'ssl://smtp.gmail.com',
    'port' => 465,
    'timeout' => 30,
    'username' => 'XXXXXXXXX@gmail.com', //<-----EDITAR AQUI
    'password' => 'XXXXXXXXX', //<-----EDITAR AQUI
    'client' => null,
    'log' => false,
    'charset' => 'utf-8',
    'headerCharset' => 'utf-8',
);


 
    public $fast = array(
        'from' => 'you@localhost',
        'sender' => null,
        'to' => null,
        'cc' => null,
        'bcc' => null,
        'replyTo' => null,
        'readReceipt' => null,
        'returnPath' => null,
        'messageId' => true,
        'subject' => null,
        'message' => null,
        'headers' => null,
        'viewRender' => null,
        'template' => false,
        'layout' => false,
        'viewVars' => null,
        'attachments' => null,
        'emailFormat' => null,
        'transport' => 'Smtp',
        'host' => 'localhost',
        'port' => 25,
        'timeout' => 30,
        'username' => 'user',
        'password' => 'secret',
        'client' => null,
        'log' => true,
        //'charset' => 'utf-8',
        //'headerCharset' => 'utf-8',
    );

}
    
    



<?php
App::uses('CakeEmail', 'Network/Email');
class MessagesController extends AppController{
    public $name='Messages';
    public $layout='layoutPrincipalEmail';
    
    
    
    
    function envia($pessoaid=null) {
        debug($pessoaid);
        
        $Email = new CakeEmail('smtp');
        $Email->to('XXXXXXXX@hotmail.com');  //<-----EDITAR AQUI
        $Email->subject('Testa Email');
        
        $corpoemail='Tomara que funfe !';
        
        $Email->attachments(array (
                    array('file'=>ROOT.'\app\webroot\img\noimage.png', //<-----EDITAR AQUI
                          'mimetype'=>'image/png'
                         ),
                    ));

                
        $Email->send($corpoemail);
        
        $this->Session->setFlash('Email Enviado ');
                   
        
    }
    
  
}

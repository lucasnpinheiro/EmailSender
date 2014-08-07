<?php
App::uses('CakeEmail', 'Network/Email');
class MessagesController extends AppController{
    public $name='Messages';
    public $layout='layoutPrincipalEmail';
    
    function novo(){
        
    }


    //testado OK
   function soenvia($endereco=null,$assunto=null,$corpoemail=null,$anexo=null) {
          
        $Email = new CakeEmail('smtp');
        $Email->to($endereco);  
        $Email->subject($assunto);
        
        $Email->attachments(array (
           array('file'=>ROOT."$anexo",
                 'mimetype'=>'application/pdf'
                ),
           ));       
         
                 
        //$Email->send($corpoemail);
        
       }
    
       
    //envia 1 email para alguém especifico
    function envia($pessoaid=null) {

        $pessoa=$this->requestAction("/pessoas/listapessoa/$pessoaid");
        $assunto='Informes de '.$pessoa[0]['Pessoa']['nome'];

        $corpoemail='Enviando pdf *-* ';
        $anexo=$pessoa[0]['Pessoa']['cpf'].'.pdf';
        $caminhocompleto='\app\webroot\files\\'.$anexo;
                
        //chamafuncao soenvia()
        $this->soenvia('masionas@hotmail.com',$assunto,$corpoemail,$caminhocompleto);
        
                           
        $this->set('pessoas',$pessoa);
    }
    
    
    //Enviar para TODOS cadastrados(com pequeno delay automatico)
    function enviatudo(){//funfando 22/07/14 as 16:13
       
        $pessoas=$this->requestAction("/pessoas/listatudo");
      
        foreach($pessoas as $pessoa){
                  
            $endereco=$pessoa['Contato']['emailprincipal'];
            $assunto='Informes de '.$pessoa['Pessoa']['nome'];
            $corpoemail='Enviando pdf *-* ';
            
            $anexo=$pessoa['Pessoa']['cpf'].'.pdf';
            $caminhocompleto='\app\webroot\files\\'.$anexo;
                       
            $this->soenvia($endereco,$assunto,$corpoemail,$caminhocompleto);
           
            sleep(3);
            
        }//fim do foreach
        
                  
        $this->set('pessoas',$pessoas);
        
        
    }
    
    
    //Enviar para TODOS cadastrados com pausa manual
    //é possivel escolher quantos emails serão enviados por vez
    //alterar a variavel divisor para isso
    function enviarepartido($inicio=0){
     
        $divisor=2; //tamanho da lista a ser dividida
        $pessoas=$this->requestAction("/pessoas/listarepartido/$inicio/$divisor");
        
              
        $Email = new CakeEmail('smtp');
        
        foreach($pessoas as $pessoa){
                  
            $endereco=$pessoa['Contato']['emailprincipal'];
            $assunto='Informes de '.$pessoa['Pessoa']['nome'];
            $corpoemail='Enviando pdf *-* ';
            
            $anexo=$pessoa['Pessoa']['cpf'].'.pdf';
            $caminhocompleto='\app\webroot\files\\'.$anexo;
                       
            $this->soenvia($endereco,$assunto,$corpoemail,$caminhocompleto);
           
            sleep(3);
            
        }
        
        $inicio+=2; 
        $tamanho=sizeof($pessoas); //tamanho da array enviada
        
        $this->set(compact('pessoas','inicio','tamanho'));
        
        
    }
    
    function enviaaomesmotempo() {
        
        //se a request for do tipo POST envia o formulario por email,
        //se for to tipo get só exibe o formulario a preencher
       
        if ($this->request->is('post')){
        
            $formularioemail=$this->data;
            $assunto=$formularioemail['message']['assunto'];
            $corpoemail=$formularioemail['message']['corpo'];
            //$anexo=$pessoa['Pessoa']['cpf'].'.pdf';
            $caminhocompleto='\app\webroot\files\todos.pdf';
                       
                     
            //$pessoa=$this->Pessoa->lists($pessoaid);

            //pega todas as pessoas cadastradas
            $pessoas=$this->requestAction("/pessoas/listatudo");
            $enderecos=array();

            //separa apenas o email de cada pessoa e guarda na array $enderecos
           foreach($pessoas as $pessoa){
                $enderecos[]=$pessoa['Contato']['emailprincipal'];
            }
     
          
            $this->soenvia($enderecos,$assunto,$corpoemail,$caminhocompleto);
            
            
            $this->redirect(array('controller' => 'pessoas', 'action' => 'index'));
            echo 'email enviado';
            
        }//FIM DO if que testa se é do tipo post               
        //se for do tipo get ... não faz nada, só exibe o form para envio de msg      
        else if($this->request->is('get')){ 	
               // echo "get";
            
       }
    
       
    }//fim da função enviatudo
   
}//fim da classe  
  


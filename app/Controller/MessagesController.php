<?php
App::uses('CakeEmail', 'Network/Email');
class MessagesController extends AppController{
    public $name='Messages';
    public $layout='layoutPrincipalEmail';
    
    function novo(){
        
    }
    
    
    //testa para ver se o arquivo existe na pasta raiz do cake
    //ou seja, '\app\webroot\files\arquivo.pdf'
    
    function testaArquivoExiste($arquivo){
           
           //a variavel $_SERVER['DOCUMENT_ROOT'] refere-se a C:/VertrigoServ/www   
            $caminhoParaTeste=$_SERVER['DOCUMENT_ROOT'].'/EmailSender/app/webroot/files/'.$arquivo;  
            if(file_exists($caminhoParaTeste)){
                return true;
            }
            else{
                 echo "O arquivo $caminhoParaTeste não existe no diretorio </br>";
         
            }        
            return false;
        
        
    }

    //anexa um arquivo diferente a partir da opção escolhida no formulario
    //se o anexo for do tipo 1 (personalizado), busca o anexo a partir do cpf
            //se for do tipo 2(mesmo para todos), busca o anexo a partir do arquivo indicado no formulario
    
    function escolheanexo($tipoanexo=1){
            //IMPLEMENTAR
                    
     
        
        
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
         
                 
        $Email->send($corpoemail);
        
       }
    
       
    //envia 1 email para alguém especifico
    function enviaindividual($pessoaid=null) {

        $pessoa=$this->requestAction("/pessoas/listapessoa/$pessoaid");
        $assunto='Informes de '.$pessoa[0]['Pessoa']['nome'];

        $corpoemail='Enviando pdf *-* ';
        $anexo=$pessoa[0]['Pessoa']['cpf'].'.pdf';
        $caminhocompleto='\app\webroot\files\\'.$anexo;
                
        //chamafuncao soenvia()
        $this->soenvia('jctsiqueira@gmail.com',$assunto,$corpoemail,$caminhocompleto);
        
                           
        $this->set('pessoas',$pessoa);
    }
    
    //Enviar para TODOS cadastrados
    //Com pequeno delay automatico para não sobrecarregar o servidor
    //funfando 01/09/14 as 12:08
    function enviaautomatico($dadosemail){
       
        $pessoas=$this->requestAction("/pessoas/listatudo"); //pega todos os emails cadastrados
        
        $assunto=$dadosemail['message']['assunto'];
        $corpoemail=$dadosemail['message']['corpo'];
        $tipoanexo=$dadosemail['message']['tipoanexo'];
              
        
        foreach($pessoas as $pessoa){
                  
            $endereco=$pessoa['Contato']['emailprincipal'];
            
            //se o anexo for do tipo 1 (personalizado), busca o anexo a partir do cpf
            //se for do tipo 2(mesmo para todos), busca o anexo a partir do arquivo indicado no formulario
       
            if($tipoanexo=='1'){//anexo personalizdo pelo cpf
                $arquivo=$pessoa['Pessoa']['cpf'].'.pdf';         
  
            }
            else if($tipoanexo=='2'){//anexo enviado pelo formulario
                $arquivo=$dadosemail['message']['arquivo'];
  
            }       
            
            //testa existencia do arquivo antes de enviar por email            
            if($this->testaArquivoExiste($arquivo)){
                $caminhocompleto='\app\webroot\files\\'.$arquivo; //se existir, coloca caminho correto
            }
            else{
               $anexocompleto=null;
            }
            
                       
            $this->soenvia($endereco,$assunto,$corpoemail,$caminhocompleto);
           
            sleep(3);
            
        }//fim do foreach
        
                  
        $this->set('pessoas',$pessoas);
        
        
    }
    
   
    
    //Enviar para TODOS cadastrados com pausa manual
    //é possivel escolher quantos emails serão enviados por vez
    //alterar a variavel divisor para isso
    function enviapausado($dadosemail=null,$inicio=0,$iniciado=false){
        $divisor=2; //tamanho da lista a ser dividida
        debug($this->data);
        $dadosemail=$this->data;
        
        //verifica se existe a index 'iniciado' dentro da array
        //se existir, pega o valor do novo inicio
        if (array_key_exists("iniciado", $dadosemail['message'])){
            if($dadosemail['message']['iniciado']==true){
                echo "ja foi iniciado</br>";                    
                $inicio=$dadosemail['message']['novoinicio'];
            }        
        }
           
        $assunto=$dadosemail['message']['assunto'];
        $corpo=$dadosemail['message']['corpo'];
        $tipoanexo=$dadosemail['message']['tipoanexo'];
                   
        
       
        //pega uma parte da lista de pessoas cadastradas
        $pessoas=$this->requestAction("/pessoas/listarepartido/$inicio/$divisor");
  
        
        foreach($pessoas as $pessoa){
         
            $endereco=$pessoa['Contato']['emailprincipal'];
            
            //se o anexo for do tipo 1 (personalizado), busca o anexo a partir do cpf
            //se for do tipo 2(mesmo para todos), busca o anexo a partir do arquivo indicado no formulario
       
            if($tipoanexo=='1'){//anexo personalizdo pelo cpf
                $arquivo=$pessoa['Pessoa']['cpf'].'.pdf';         
  
            }
            else if($tipoanexo=='2'){//anexo enviado pelo formulario
                $arquivo=$dadosemail['message']['arquivo'];
  
            }       
            
            //testa existencia do arquivo antes de enviar por email            
            if($this->testaArquivoExiste($arquivo)){
                $caminhocompleto='\app\webroot\files\\'.$arquivo; //se existir, coloca caminho correto
            }
            else{
               $anexocompleto=null;
            }
            
                       
            $this->soenvia($endereco,$assunto,$corpo,$caminhocompleto);
           
            sleep(3);           
        }
        
        $inicio+=2; 
        $tamanho=sizeof($pessoas); //tamanho da array enviada
        
        $this->set(compact('pessoas','inicio','tamanho','dadosemail'));
         
        
    }
    
    function enviaaomesmotempo() {
        
        //se a request for do tipo POST envia o formulario por email,
        //se for to tipo get só exibe o formulario a preencher
       
        if ($this->request->is('post')){
            //debug($this->data);
            
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
            
            
            //$this->redirect(array('controller' => 'pessoas', 'action' => 'index'));
            echo 'email enviado: envia ao mesmo tempo com pausa automatica';
            
        }//FIM DO if que testa se é do tipo post               
        //se for do tipo get ... não faz nada, só exibe o form para envio de msg      
        else if($this->request->is('get')){ 	
               // echo "get";
            
       }
    
       
    }//fim da função enviatudo

//    Picking, separação   
//    Recebe o formulario de email e separa para a função correta
//    podendo ser 1- Todos com pausa, 2- todos sem pausa, 3 - individual
    
    function picking(){
         $this->autoRender = false ;
//         debug($this->data);
        
        if ($this->request->is('post')){
            
            
            $formularioemail=$this->data;
            
            $tipoemail=$formularioemail['message']['tipoemail'];
                
            switch($tipoemail){
                case '1':
                    $this->enviaautomatico($formularioemail);              
                    $this->render('enviaautomatico'); 
                    break;
                
                
                case '2':
                    $this->enviapausado($formularioemail,0,false);
                    $this->render('enviapausado');   
                    break;
                
                case '3':     
                    $this->enviaindividual($formularioemail);
                    $this->render('enviaindividual');                        
                    break;
                
                
                default :
                    echo "OPCAO INVALIDA !";
                        
            }    
            
         
        }//FIM DO if que testa se é do tipo post               
        //se for do tipo get ... não faz nada, só exibe o form para envio de msg      
        else if($this->request->is('get')){ 	
               // echo "get";
            
       }
       
       
       $this->set('tipoemail',$tipoemail);
       
        
    }
    
    
}//fim da classe  
  


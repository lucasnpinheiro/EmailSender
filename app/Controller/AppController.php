<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

//App::uses('Controller', 'Controller');
class AppController extends Controller {
    public $sid;//armazenará id da session
    public $tipoid;//armazenaroa id do tipo de produto
    public $pratoid;//armazenaroa id do tipo de produto
    
    public $uses=array('Prato','Tipo','Pedido','Email','Pessoa','Contato');
    public $helpers=array('Form','Html','Session','Js');//Js para javascript
    public $components=array('Session','RequestHandler');//tinha +1 no exemplo chamado shop o.o
            

    	
/*
    configura as páginas que serão carregadas após as ações de login e logoutRedirect
login: redireciona para index e logout para home 
	
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'index')
        )
    );

 
	Before filter define as páginas que podem ser vistas pelo usuário SEM que registrar
	os usuários não precisam de LOGIN pra ver index e view
	
	O que fizemos na função beforeFilter foi dizer ao AuthComponent
	para não solicitar um login para todas as actions index e view, em todos os controller.
*/	
   
   
   function beforeFilter() {

    
        //$this->Auth->allow('index', 'view'); usado para autenticação
        //&&(int)$this->passedArgs['tipo_id']!=1) 
       
       if(isset($this->passedArgs['tipo_id'])){
           $this->tipoid=(int)$this->passedArgs['tipo_id'];
       }
       else{
           $this->tipoid=0;
       }
       
       
       if(isset($this->passedArgs['prato_id'])&&(int)$this->passedArgs['prato_id']!=''){
           $this->pratoid=(int)$this->passedArgs['prato_id'];
       }
       else{
           $this->pratoid=0;
       }
       
       //$this->sid=$data['Config']['userAgent']; DANDO ERRO, USERAGENT NUNCA MUDA !
       //AGORA USA ID ;)
       
       //$this->Session->destroy(); //destroi sess�es anteriores O.� n�o precisa usar
       //cria uma sessão vazia só para obter o ID
       
       $this->Session->write('sessaoVazia', 'vazia');       
       $this->sid=$this->Session->id(session_id());
       
               
         
           
       //seta as variaveis para todos os controllers poderem usa-las
       $this->set('tipoid',$this->tipoid);
       $this->set('pratoid',$this->pratoid);
       $this->set('sid',$this->sid);
       
       $this->set("title_for_layout","Page Title Value");//não ta funfando :(
        
    }



}

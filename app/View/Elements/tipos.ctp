<?php


//este element é chaamado a partir da view /Pedidos/index.ctp
//app/views/elements/categories.ctp
//esse elemento será chamado como default caso não tenha nenhum produto ou 
//categoria passado via URL
	

            //manda buscar todos os tipos cadastrados

              $tipos=$this->requestAction("/tipos/getAll");		        
              
              //corre por todos os tipos e imprime Nome e IMG tudo em forma de link
              //tudo dentro de uma div especifica para o produto ficar bonitinho no layout 
              // *-*
              
              foreach($tipos as $tipo){
                  ?>
                <div id="tipo_container">
                    <?php
                    
                     //moneta um link com o nome e id de todas os tipos
                    
                        $nome=$tipo['Tipo']['nome'];
                        $url='/pedidos/index/tipo_id:'.$tipo['Tipo']['id'];                         
                        
                        echo $this->Html->image($tipo['Tipo']['image'], array('alt' => 'CakePHP'));
                        echo "</br>";
                        echo $this->Html->link($nome,$url);
                        
                      
                        
		
		?>
                 </div>   
                <?php
              }//fim do foreach
       ?>	
		
<?php
	

	
?>


<?php 

echo $this->Html->link('Exibir Pessoas', array('controller' => 'Pessoas', 'action' => 'exibe'));
echo "</br>";
echo "</br>";
echo $this->Html->link("Buscar Pessoas",'/pedidos/exibe');
echo "</br>";
echo "</br>";
echo $this->Html->link("Exibir Pessoas",'/pedidos/exibir');


	                
             /*		        
		foreach($tipos as $tipo){
                      
                    
			//... codigo para correr todas as categorias e 
			//montar uma linha com link para cada uma delas
			
			//echo $tipo['Tipo']['nome']; echo "</br>"; imprime o nome de todos os tipos
                    
                     //moneta um link com o nome e id de todas os tipos
                        $nome=$tipo['Tipo']['nome'];
                        $url='/pedidos/index/tipo_id:'.$tipo['Tipo']['id'];                         
                        echo $this->Html->link($nome,$url);
                        //echo $this->Html->link("Ver pedido",'/pedidos/view/');/
                        echo "</br>";
		
		}//fim do foreach
                
              */  
            
    ?>
<?php
//esse element é usado para listar todos os produtos de uma categoria especifica
//ele chama a função lists de PratosController e é chamado dentro da view /Pedidos/index.ctp q  
////o resultado também ocorrerá dentro da coluna do meio do layout
//

$pratos = $this->requestAction("/pratos/lists/prat:$tipoid/"); //funfando !! *-*

//debug($pratos);

foreach($pratos as $prato){//imprime os dados de todos os pratos da categoria especifica
    ?>
        <div id="produto_container">
    <?php 
                //moneta um link com o nome do prato, tipoid e pratoid
                //o link vai mandar argumentos para PratosController 
                //direto para a action View que exibirá os deatalhes do produto
                    
                        $nome=$prato['Prato']['nome'];
                        $pid=$prato['Prato']['id'];                                
                        $url="/pratos/view/tipo_id:$tipoid/prato_id:$pid";
                        
                        
                        echo $this->Html->image($prato['Prato']['thumbnail'], array('alt' => 'CakePHP'));
                        echo "</br>";
                        echo $this->Html->link($nome,$url);
    
          
     ?>
         </div> <!--fim da div tipo container-->  
                <?php
                                    
}//fim do foreach
 
              

/*
 *           //<div class="product_container">
            //</div>

foreach($pratos as $pratos): ?>
		
		<?php
		
			if(){
			//se tiver img imprime img, senão cola img paddrão
			}
			else{
				//...
			}
			
			
			echo $html->link($product['Product']['name'],
				"/products/view/cat_id:$catId/pd_id:".$product['Product']['id']); 

			
	
	
?>
		</div>
			
	
	<?php endForeach; ?>
 
 */

?>
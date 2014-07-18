<h2>Pedido</h2></br>

<?php
//exibe o conteudo do pedido com detalhes, alem de opções para edição

$pratos=$this->requestAction("/pedidos/getPedido");

$total=0;
    if(!empty($pratos) && is_array($pratos)){
       	
        foreach($pratos as $prato){
             $total+= $prato['Prato']['preco'];  
             echo $this->Html->image($prato['Prato']['thumbnail'], array('alt' => 'CakePHP'));
             echo "   ".$prato['Prato']['nome'];
             echo "   /   "; 
             echo "R$ ".$prato['Prato']['preco'];
             echo "</br>";   
             echo "Quant: ".$prato['Pedido']['qty'];
             echo "  "; 
             echo $this->Html->link("Editar","/pedidos/edit/".$prato['Pedido']['id']);
             echo "   /   "; 
             $url='/pedidos/deletaPratoPedido/prato_id:'.$prato['Pedido']['prato_id'];
             echo $this->Html->link('Apagar',$url);
              
             
             echo "<br>";
             echo "<br>";
        }
        //formatar essa saida de numero depois
        echo "<br>";
        echo "<br>";
        echo "Valor total do pedido: R$ $total reais";
    }
    
    echo "<br>";
    
    echo "</br>".$this->Html->link("Continuar Pedido",'/pedidos/index');
    
    echo "</br>".$this->Html->link("Fechar Conta",'/contas/fecha');
         
    echo "</br>".$this->Html->link(
         'Esvaziar Pedido',
         array('controller' => 'pedidos', 'action' => 'esvaziaPedido'),
         array(),
         "Tem certeza que deseja apagar todos os pratos do pedido ?"
     );
                    
     echo "</br>";

?>


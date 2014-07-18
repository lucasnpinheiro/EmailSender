<?php
//exibe o conteudo do carrinho na coluna do lado direito do layout

echo "listinha marota do que comprou =)</br></br>";

//echo $sid;
//echo "tipoid: $tipoid </br>";
//echo "pratoid: $pratoid </br>";
//$sessaoTESTE='XXX';
$pedidos=$this->requestAction("/pedidos/getPedido/session_id:$sid");


//se a array não estiver vazia e for realmente uma array 
//isso impede de tentar imprimir um pedido vazio, gerando erro
if(!empty($pedidos) && is_array($pedidos)){
    $total=0;
    foreach($pedidos as $pedido){
        echo $pedido['Pedido']['qty'];//funfou
        echo " x ";
        echo $pedido['Prato']['nome'];//funfou *_________* associação correta entre as tabelas
        echo "</br>(".$pedido['Prato']['preco'].")";
        echo "</br></br>";
        
        $total+=$pedido['Prato']['preco']*$pedido['Pedido']['qty'];
        
    }
    
    echo "Total: $total";
    echo "</br>";
    //devo trocar esse link por uma imagem depois
    echo $this->Html->link("Ver pedido",'/pedidos/view/');
    
    
  
    
}
else{
    echo "Pedido vazio ! Adicione algum prato";
}

?>


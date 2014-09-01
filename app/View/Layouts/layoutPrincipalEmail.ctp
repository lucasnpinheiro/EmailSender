<?php
 
$cakeDescription = __d('cake_dev', 'Mass Email Sender');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>    
        <title>
		<?php echo $cakeDescription ?>:
		<?php //echo $title_for_layout; ?>
	</title>
        
        <?php
        
        
        echo $this->Html->css('cssLayoutEmailSender');
        
        //arquivos para trabalhar com bootstrap
        echo $this->Html->css('bootstrap'); 
        echo $this->Html->script('bootstrap'); 
      
        ?>
    </head>
    <body>
        <div class="container">
           
            <div class="jumbotron" id="cabecalho">
                
                    <h1>EmailSender</h1>
                    <p>
                        Envie emails em massa, a partir de uma base de dados e com anexos
                        personalizados, de acordo com uma chave que você escolher !
                    </p>
            </div>
                 
                     
                <!-- Menu de navegação-->
                <div class="row">
                    <div class="col-sm-12" id="menu-navegacao">
                        <?php echo $this->element('menu'); ?>   
                       
                    </div>
                    
                                                    
                    <div class="container">                  
                        
                       <!--conteudo pricipal-->    
                        <div class="col-sm-12" id="conteudo-principal">
                            <?php echo $content_for_layout;  ?> 
                        </div>  
                    </div>
                    
                                     
                  
                    
                    
                    <!--Rodapé -->
                      <div class="col-sm-12" id="rodape">
                         <?php echo "Julio Cesar Siqueira - 2014 - Contato: jctsiqueira@gmail.com"; ?>
                    </div>
                    
                </div>
            </div>
 
    </body>
    
</html>

     
        




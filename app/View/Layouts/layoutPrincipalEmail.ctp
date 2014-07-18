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
      
        ?>
    </head>
    <body>
        
        <div id="main_content_container">
        
            	<div id="header">
			<h1><?php echo "Mass Email Sender" ?></h1>
		</div>
            
            <div id="leftnav">
                <?php echo $this->element('menu'); ?>            
            </div>
            
            <div id="rightnav" >
              <?php //echo $this->element('listapedido'); ?>
            </div>
            
            <div id="main_body_container" >
                <p>
                    <?php echo $content_for_layout;  ?> 
                </p>
            </div>
            
            

            
            <div id="rodape" >
                <?php echo "Julio Cesar Siqueira - 2014 - Contato: jctsiqueira@gmail.com"; ?>
            </div>
        
        </div>
           
        
    </body>
    
</html>

     
        




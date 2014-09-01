<!--Novo menu baseado no bootstrap-->

<nav class="navbar navbar-default" role="navigation" id="menu-navegacao">
    	
    <div class="navbar-header">
            <a class="navbar-brand" href="/EmailSender/">EmailSender</a>
	</div>
    
        <ul class="nav navbar-nav">
                    <li><?php echo $this->Html->link('Cadastros', array('controller' => 'Pessoas', 'action' => 'exibe'));?></li>
                    <li><?php echo $this->Html->link("Buscar",'#');?></li>
                    <li><?php echo $this->Html->link("Enviar Email",'/messages/novo');?></li>
         </ul>
</nav>

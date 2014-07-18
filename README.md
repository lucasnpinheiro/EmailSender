EmailSender
=======


Aplicativo desenvonvolvido em PHP para enviar email em massa, a partir de uma base de dados;
Os anexos serão personalizados a partir de uma chave (ex: o cpf da pessoa).
A principio os arquivos a serem enviados deverão ter o mesmo que essa chave



Desenvolvido especialmente para solucionar um problema interno de onde eu trabalho :)


Instruções para teste:


0 - Crie um BD no MySql com o nome de "bdcakeemailsender" e importe o arquivo bdcakeemailsender.sql 
(localizado na raiz deste repositorio)

1 - Jogue os arquivos num servidor PHP como o Apache (pasta WWW)

2 - No arquivo App/Config/Email.php configure um email e senha validos para acessar um
servidor smtp (testei apenas o Gmail até o presente momento)

3 - No arquivo App/Controller/MessagesController.php configure destinatário e anexos

4 - Abra no navegador na pagina http://localhost/EmailSender/Pessoas/exibe e envie um email de teste

5 - Sucesso ;)
# Crud Laravel

**Objetivo:** Listar, dar acesso, editar, apagar e pesquisar as informações das empresas cadastradas e seus respectivos funcionários.
Este projeto foi desenvolvido com o framework laravel do php e para executá-lo foi utilizado o docker desktop e a criação de container (laradock).

## Execução

Para executar esse projeto é necessário que tenha em seu computador o software Docker instalado e iniciado, uma vez com o docker instalado e executando deve-se inserir no terminal CMD do windows **ou** terminal bash do git hub os seguintes comandos:
	Em ambos os terminais faz-se necessário acessar via terminal o a pasta do projeto (Crud-Laravel), em seguida executar o comando "cd laradock" e depois os comandos abaixo:
 * CMD:  
	docker-compose up -d nginx mysql 
       
        docker exec -it crud-laravel_workspace_1 sh
	
	php artisan db:seed

 * Bash: winpty docker-compose up -d nginx mysql 
       	
	winpty docker exec -it crud-laravel_workspace_1 sh
	
	php artisan db: seed

Onde o primeiro comando é necessário para iniciar o container do docker, o segundo comando é para ter acesso 
Em seguida para visualizar o projeto em execução é necessário ir até o navegador, digitar no campo de url "localhost/login", agora será preciso fazer o login, para isso utilize o email e senha especificados abaixo:

 * email: admin@admin.com

 * password: password

Pronto! agora é possivel utilizar o site.

**Observação:** com o comando php artisan db:seed, os banco de dados receberá dados para fins de teste, dessa forma assim que fizer o login no sistema já será possivel visualizar os dados contidos no banco.

<?php 

use core\classes\Database;
use core\classes\Functions;


//abrir a sessao
session_start();


// carregar config
require_once('../config.php');

//carrega as pastas do projeto
require_once('../vendor/autoload.php');


$db = new Database();
$clientes = $db->select("SELECT * FROM clientes");

echo "<pre>";
print_r($clientes);





/*
carregar configs, 
classes, 
sistemas de rotas
	-mostrar loja
	-mostrar carrinho
	-mostrar o backoffice 
*/
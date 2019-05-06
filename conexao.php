<?php

	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'adocao_legal');

	$conn= mysqli_connect(HOST,USER,PASS,DB);
        
        if($conn->connect_error === TRUE)
        {    die("Deu erro na conexão ". $conn->connect_error);}

?>
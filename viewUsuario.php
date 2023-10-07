<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização</title>
    <link rel="stylesheet" href="indexstyle.css">
</head>
<body>
    <style>
        body{
           background-color: #f2f2f2;
        }
    
    </style>
    <header>
    <div class="logo"><H1>Pixie</H1><h2>Pay</h2></div>
        <div class="nav-bar">
           <a href="index.html">Home</a>
    </header>


    <?php
    if(isset($_SESSION['mdg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    require './Conn.php';
    require './userUsuario.php';

    $listUsers = new usuario();
    $result_users = $listUsers->list();

    foreach ($result_users as $row_user){
        extract($row_user);
        
        echo "Nome: $nome <br>";
        echo "email: $email <br><br>";
    }
    ?>
</body>
</html>
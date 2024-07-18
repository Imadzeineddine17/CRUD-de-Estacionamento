<?php
    session_start();
   // print_r($_REQUEST);
    if (isset($_POST['submit'])&& !empty($_POST['cpf']&& !empty($_POST['senha'])))
    {
        include_once('conexao.php');
        $cpf = $_POST['cpf'];
       // $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // print_r('CPF:' . $cpf);
        // print_r('<BR>');
        // print_r('Senha:' . $senha);

        $sql= "SELECT * FROM clientes WHERE cpf = '$cpf' and senha = '$senha'";

        $result = $mysqli->query($sql);

        // print_r($sql);
        // print_r($result);
         
        if(mysqli_num_rows($result)<1)
        {   
            unset($_SESSION['cpf']);
            //unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        }
        else
        {
            $_SESSION['cpf'] = $cpf;
           // $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }


    }
    else
    {
        header('Location: index.php');  
    }
?>

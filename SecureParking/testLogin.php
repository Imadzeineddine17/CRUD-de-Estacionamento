<?php
    session_start();
   // print_r($_REQUEST); 
    if (!empty($_REQUEST['cpf'])&& !empty($_REQUEST['senha']))
    {
        include_once('conexao.php');
        $cpf = $_REQUEST['cpf'];
       // $nome = $_POST['nome'];
        $senha = $_REQUEST['senha'];

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
            //header('Location: index.php');
            echo "false";
        }
        else
        {
            $_SESSION['cpf'] = $cpf;
           // $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            //header('Location: sistema.php');
            echo "OK";
        }


    }
    else
    {
        //header('Location: index.php');  
        echo "false";
    }
?>

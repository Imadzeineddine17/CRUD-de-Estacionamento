<?php 
    include_once('conexao.php');

    if(isset($_POST['update']))
    {
         $id = mysqli_real_escape_string($mysqli, $_POST['id']);
        // $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        // $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
        // $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        // $senha = mysqli_real_escape_string($mysqli,$_POST['senha']);
        // $csenha = mysqli_real_escape_string($mysqli,$_POST['csenha']);
        // $telefone =mysqli_real_escape_string($mysqli, $_POST['telefone']);
        // $genero =mysqli_real_escape_string($mysqli, $_POST['genero']);
        // $data_nasc =mysqli_real_escape_string($mysqli, $_POST['data_nascimento']);
        // $endereco =mysqli_real_escape_string($mysqli, $_POST['endereco']);
        // $cep =mysqli_real_escape_string($mysqli, $_POST['cep']);
        // $numero_complemento = mysqli_real_escape_string($mysqli,$_POST['numero_complemento']);
        $modelo_veiculo =mysqli_real_escape_string($mysqli, $_POST['modelo']);
        $placa_veiculo =mysqli_real_escape_string($mysqli, $_POST['placa']);
        $ano_veiculo = mysqli_real_escape_string($mysqli,$_POST['ano']);

        $sqlUpdate = "UPDATE veiculos SET modelo='$modelo_veiculo',placa='$placa_veiculo',ano='$ano_veiculo' WHERE ID='$id'";

        $result = $mysqli->query ($sqlUpdate);
        //var_dump($result);
    }
    header('Location: lista_veiculos.php');
?>
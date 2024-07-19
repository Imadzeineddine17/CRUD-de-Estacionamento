<?php 

if(!empty($_GET['id']))
{
    include_once("conexao.php");

    $id = $_GET['id'];

    $sqlselect= "SELECT * FROM clientes WHERE id = $id";

    $result= $mysqli->query($sqlselect);

    if($result-> num_rows > 0)
    {
     $sqlDelete = "UPDATE `usuarios`.`clientes` SET `deletado`=1 WHERE  `id`=$id";
     $sqlVeiculoDelete = "UPDATE `usuarios`.`veiculos` SET `deletado`=1 WHERE  `clienteid`=$id";
     $resultDelete= $mysqli->query($sqlDelete);  
     $resultVeiculoDelete= $mysqli->query($sqlVeiculoDelete);  
     echo $resultDelete->num_rows;
    }

}
header('Location: sistema.php');


?>
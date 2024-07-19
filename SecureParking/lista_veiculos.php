<?php
    session_start();
    include_once('conexao.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['nome']) == true)and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['cpf']);
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
    //$logado = $_SESSION['nome'];
    if(!empty($_GET['search']))
    {
      $data = $_GET['search'];
      //var_dump($data);
      //die;
      $sql = "SELECT v.*, c.nome FROM clientes c,veiculos v WHERE c.id= clienteid AND(v.id LIKE '%$data%' OR modelo LIKE '%$data%' OR placa LIKE '%$data%'OR ano LIKE '%$data%')";
    }
    else
    {
      $sql = "SELECT v.*, c.nome FROM clientes c,veiculos v WHERE c.id= clienteid AND c.deletado = 0 ORDER BY v.id DESC";
    }

    $result = $mysqli->query($sql); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <title>Sistema</title>
      <style>
         *{
            box-sizing: border-box;
            margin: 0;  
            padding: 0;
        
        }
        
        .bg {
            background-image: url("./imagens/verde.jpg"); 
            filter: blur(px); 
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            background-position:bottom; 
        }
  
          body {
              background-image: linear-gradient(45deg, blue, white);
              color: white;
              text-align: center; 
         }
         .table-bg{
          background-color: white;
          color: black;
          margin-left: auto;
          margin-right: auto;
         }
         .box-search{
          display: flex;
          justify-content: center;
          gap: .1;  
         }
    </style>
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="http://localhost/cursoPHP/ex000/SecureParking/sistema.php#">
      Secure Parking
    </a>
    <div class="d-flex">
    <a href="sistema.php" class="btn btn-danger  me-5">Voltar</a>
</div>
  </div>
</nav>
<br><br>
   <?php
   echo "<h1>Bem vindo</h1>";    
   ?>
   <br><br>
   <div class="box-search">
    <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
    <button onclick="searchData()" class="btn btn-success"> 
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
      </svg>
    </button>
   </div>
   <br><br>
        <div class = "m-0">
          <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">nome</th>
            <th scope="col">modelo</th>
            <th scope="col">placa</th>
            <th scope="col">ano</th>
            <th scope="col">...</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          while($user_data = mysqli_fetch_assoc($result)){

          $deletado = "";
          if ($user_data['deletado'] == 1) {
            $deletado = "<span class='badge bg-danger'>Deletado</span>";
          }
          
            echo "<tr>";
            echo "<td >".$user_data['id']."</td>";
            echo "<td>".$user_data['nome'].$deletado."</td>";
            echo "<td>".$user_data['modelo']."</td>";
            echo "<td>".$user_data['placa']."</td>";
            echo "<td>".$user_data['ano']."</td>";  
            echo "<td>
            <a class= 'btn btn-sm btn-primary' href='editar_veiculo.php?id=$user_data[id]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
  <svg>
  </a>
  
            </td>";
            echo "</tr>";   
          }
        ?>
        </tbody>
      </table>
   </div>

    
</body>
<body class="bg">
  
</body>
 <script>
  var search = document.getElementById('pesquisar');

  search.addEventListener("keydown", function(event){
      if (event.key === "Enter")
      {
        searchData();
      }
  });
  function searchData()
  {
    //console.log(search.value)
    window.location = 'lista_veiculos.php?search='+search.value;
  }
  </script>

</html>


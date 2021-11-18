
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>CRUD</title>
  </head>

  <body>

 <?php include "conexao.php"; include "cadastro_codigoSql.php";
  // fetch dados actualizados
	if (isset($_GET['editar'])) {
		$id = $_GET['editar'];
		$editar_v=true;

		$rec = mysqli_query($conn, "SELECT * FROM viaturas WHERE id=$id");
		$record = mysqli_fetch_assoc($rec);
		$marca = $record['marca'];
		$modelo = $record['modelo'];
    $preco=$record['preco'];
    $categoria=$record['categoria'];
    $id = $record['id'];
  }
  
?>
    <div class="Container">
    <div class="row"> 
        <div class="col">
             <div class="input-group"><h1 >Bila's Car Management</h1></div>
        <form action ="cadastro_codigoSql.php" method="POST">
          
             <div   class="input-group">
             <input type="hidden"  name="id" value="<?php echo $id ?>">
               <label for="marca" class="input-group">Marca da viatura</label>
               <input type="text" class="form-control" name="marca" value="<?php  echo $marca ?> "> 
              	
             </div>    
             
             <div class="input-group">
               <label for="modelo" class="input-group">modelo</label>
               <input type="text" class="form-control" name="modelo" value="<?php echo $modelo ?>">  
             </div>  

             <div class="input-group">
               <label for="preco" class="input-group">preco</label>
               <input type="text" class="form-control" name="preco" value="<?php echo $preco ?>">  

             </div> 

             
             <div class="input-group">
               <label for="categoria" class="input-group">categoria</label>
               <input type="text" class="form-control" name="categoria" value="<?php echo $categoria?>">  

             </div> 


             <div class="input-group">
             <?php if ($editar_v==false): ?>
				<button type="submit" name="salvar" class="btn btn-outline-success">Gravar</button>
				
        <?php else: ?>
				<button type="submit" name="actualizar" class="btn btn-outline-success">Editar</button>
        
        <?php endif ?>
             </div> 
         </form>

         <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <form class="d-flex" action ="cadastroForm.php" method="POST">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca" >
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php  include "conexao.php";

      if(isset($_POST['busca'])){
          $pesquisa=$_POST['busca'];
      }else
      $pesquisa='';

      $sql="SELECT * FROM viaturas WHERE marca LIKE '%$pesquisa%'";

      $result= mysqli_query($conn,$sql);
 
    ?>

         
<div class="bd-example">
  <table class="table table-hover">
      <thead>
    <tr>
      <th scope="col">marca</th>
      <th scope="col">modelo</th>
      <th scope="col">preco</th>
      <th scope="col">categoria</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
      while($linha=mysqli_fetch_assoc($result)){ $id=$linha['id']; ?>
   

          <tr>
            <th scope='row'><?php echo $linha['marca'];?></th>
            <td><?php echo $linha['modelo'];?> </td>
            <td><?php echo $linha['preco'];?> </td>
            <td><?php echo $linha['categoria'];?> </td>
            <td>
       <a  href="cadastroForm.php?editar=<?php echo $linha['id']; ?>" class="btn btn-success">editar</a> 
       <a  href="cadastroForm.php?del=<?php echo $linha['id']; ?>" class="btn btn-danger">excluir</a>
            </td>
          </tr>

          <?php } ?>
     
    
  </tbody>

  </table>
 

 
</div>
         <a href="index.php" class="btn btn-primary ">Voltar ao inicio</a>
         </div>

    </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
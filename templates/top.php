<?php
$title = "Главная страница";

require_once('config/config.php');


?>



<!DOCTYPE html>
<html lang="en">

  <head>
	<style>
		td{
			border:1px solid black;
		}
		th{
			border:1px solid black;
		}
	</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta name="description" content="">-->
    <meta name="author" content="">
	<meta name="description" content="<?php echo $description ?>">
	
	
	
<title>
	
	<?php echo (isset($title))?$title:''?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" href="#" data-body="Узнайте больше о нас" data-color="red">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu" href='static.php?url=contact'>Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-md-3">


		  
<?php
	/*if(isset($_SESSION['user_id'])){
	echo $_SESSION['id'];*/
	if(isset($_SESSION['user_id'])){

?>
	<a href="/cabinet.php">Кабинет</a><br>
	<a href="/logout.php">Выход</a><br>
	
<?php	
	
	
	}else{
?>
	<div id="title"></div>
	<a href="/login.php">Вход</a>
	<a href="/register.php">Регистрация</a>
<?php
	}
?>

		  
		  
		  
          <div class="list-group">
		  <?
			$id=(int)$_GET['id'];
			$query = "SELECT * FROM catalogues WHERE type='main'";
			$adr = mysqli_query($db_con, $query);
			if(!$adr){
				exit($query);
			}
			while($tbl_catalog = mysqli_fetch_array($adr)){
		  ?>
		  
            <a href="catalog.php?id=<?=$tbl_catalog['id']?>" class="list-group-item">
			<?=$tbl_catalog['name']?></a>
			<?}?>	
            <!--<a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>-->
          </div>

        </div>
        <!-- /.col-lg-3 -->
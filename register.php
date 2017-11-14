<? require_once('templates/top.php');
if($_POST){//срабатывает, если пользователь нажал на кнопку submit
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
	
	
	$p_name = $_POST['name'];
	$p_email = $_POST['email'];
	$p_password = $_POST['password'];
	$p_password_again = $_POST['password_again'];
	$errors = array();
	if(!$p_name){
		$errors[] = "Поле name не заполнено";
	}
	if(!$p_email){
		$errors[] ="Поле email не заполнено";
	}
	if(!$p_password){
		$errors[] ="Поле password не заполнено";
	}
	if($p_password != $p_password_again){
		$errors[] = "Поле password не совпадает с полем password_again";
	}
	$query = "SELECT * FROM users WHERE email = '$p_email'";
	$adr = mysqli_query($db_con, $query);
		if(!$adr){
			exit($query);
		}
	$already_user = mysqli_fetch_array($adr);	
	if(!empty($already_user)){
		$errors[] = "Такой email уже есть";
	}
	
	if(!empty($errors)){
		foreach($errors as $error){
			echo "<div class='error red' style='color:red'>";
			echo $error;
			echo "</div>";
		}
		echo "<prev>";
		print_r($errors);
		echo "</prev>";
	}else{
		//echo "OK";
		$query = "INSERT INTO users VALUES(
		 NULL, 
		 '$p_name',
		 '$p_email',
		 '$p_password',
		 'unblock',
		 NOW(),
		 NOW()		 
		)";
		$adr = mysqli_query($db_con, $query);
		if(!$adr){
			exit($query);
		}
		?>
		<script>
			document.location.href="login.php";
		</script>
		<?
	}
		

}

?>
<form method="post" action="register.php">
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password">Password again</label>
    <input type="password" class="form-control" name="password_again" id="password_again" placeholder="Password_again">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
<? require_once('templates/bottom.php')?>
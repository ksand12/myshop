<?
require_once('templates/top.php');
if($_SESSION['user_id']){
	if($_POST){//если была нажата кнопка submit и форма была отправлена выполняется это условие
		$pname = $_POST['name'];
		$pbody = $_POST['body'];
		$pcatalog_id = (int)$_POST['catalog_id'];
		echo "<pre>";
			print_r($_POST);
		echo "</pre>";

	if($_FILES){
		
			//echo "<pre>";
				//print_r($_FILES);
			//echo "</pre>";
		$file_name_tmp = $_FILES['picture']['tmp_name'];
		$dir = '/media/uploads/';
		$file_new_name = $_SERVER['DOCUMENT_ROOT'].$dir;
		$picture = $_FILES['picture']['name'];
		//$picture = date('y_m_d_h_i_s').'.jpg';
		if(move_uploaded_file($file_name_tmp, $file_new_name.$picture)){
			$ok = true;
		}
	}else{
		$picture = '';
		echo "no file";
	}
	$query = "INSERT INTO products VALUES(
		NULL,
		'$pname',
		'$pbody',
		'$picture',
		'-',
		0,
		NOW(),
		'-',		
		'".date('ymdhis')."',
		'new',
		$pcatalog_id,
		".$_SESSION['user_id']."
	)";
	$adr = mysqli_query($db_con,$query);
	if(!$adr){
		exit('error');
	}
	?>
	<script>
		document.location.href="cabinet.php";
	</script>
	<?php
	}
	?>
<div class="col-md-9">	
          <h1 class="my-4">Shop Name</h1>
<form action="cabinet.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" name="body" id="body" rows="3"></textarea>
	<p class="help-block">Description here</p>
	
  </div>
  <div class="form-group">
	<label for="picture">File input</label>
	<input type="file" class="form-control" name="picture" id="picture">
	<p class="help-block">Example block-level help</p>
  
  
  </div>
  <div class="form-group">
    <label for="picture">Category</label>
    <select class="form-control" name="catalog_id">
		<?php
			$query = "SELECT * FROM catalogues";
			$adr = mysqli_query($db_con, $query);
			if(!$adr){
				exit('error');
			}
			while($cats = mysqli_fetch_array($adr)){
			?>
				<option value="<?php echo $cats['id']?>"><?php echo $cats['name']?></option>
			<?php			
			}	
		?>


	</select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
 
<table width="100%">
	<tr>
		<th>Photo</th>
		<th>Products</th>
		<th>Price</th>
		<th>Action</th>
	</tr>


<?php
	$query = "SELECT * FROM products WHERE user_id= ".$_SESSION['user_id'];
	$adr = mysqli_query($db_con, $query);
	if(!$adr){
		exit('error');
	}
	while($prod = mysqli_fetch_array($adr)){
		$id = (int)$prod['id'];
?>	
	<tr>
		<td width="100px">
<?		
	if($prod['picture'] != ''){
		$pic = '/media/uploads/'.$prod['picture'];
	}else{
		$pic = '/media/uploads/no_photo.jpg';
	}		
		
?>	
			<img src="<? echo $pic;?>" width="100%" class="pic"/>
		</td>
		<td><?php echo $prod['name']?></td>
		<td><?php echo $prod['price']?></td>
		<td class="action">
			<a href="prodedit.php?id=<?php echo $id;?>" class="btn btn-success btn-block edit">Редактировать</a>
			<a href="#" onClick=
			"delete_position('delete.php?id=<?php echo $id?>','Вы действительно хотите удалить этот товар?')" class="btn btn-warning btn-block delete">Удалить</a>
		</td>
	</tr>

<?	
	}
?>	
</table>

</div> 
	

	<?php
}else{
	?>
	<div class="error">Ошибка доступа</div>
	<?php
}
require_once('templates/bottom.php');
?>
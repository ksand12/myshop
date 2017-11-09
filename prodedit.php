<?
require_once('templates/top.php');
if($_SESSION['user_id']){
	
	if($_GET['id']){
		$id = (int)$_GET['id'];
	}else{
		$id = 0;
	}
		$query = "SELECT * FROM products WHERE id = $id";
		$adr = mysqli_query($db_con, $query);
		if(!$adr){
			exit('error');
		}
		$product = mysqli_fetch_array($adr);
		if($_POST){
		$query = "UPDATE products
		SET name='$pname', body = '$pbody'
		WHERE id=$id AND user_id = ".$_SESSION['user_id'];
		}
?>

	<form action="prodedit.php?id=<? echo $id?>" method="post" enctype="multipart/form-data">
	  <div class="form-group">
		<label for="exampleInputEmail1">Name</label>
		<input name="name" type="text" value="<? echo $product['name']?>" class="form-control" id="name" placeholder="Name">
	  </div>
	  <div class="form-group">
		<label for="body">Body</label>
		<textarea class="form-control" name="body" id="body" rows="3">
		<? echo $product['body']?>
		</textarea>
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
					<option <? echo ($product['catalog_id'] == $cats['id'])?'selected':''?> value="<?php echo $cats['id']?>"><?php echo $cats['name']?></option>
				<?php			
				}	
			?>


		</select>  
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
<?
}else{
	echo 'Ошибка входа.';
}
require_once('templates/bottom.php');
?>
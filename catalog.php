<?php

require_once('templates/top.php');



$id = (int)$_GET['id'];
$query = "SELECT * FROM catalogues
WHERE id = '$id'";
$adr = mysqli_query($db_con, $query);
if(!$adr){
	exit($query);
}
$tbl_maintext = mysqli_fetch_array($adr);


 ?>


        <div class="col-lg-9">
			<h2>
				<?=$tbl_maintext['name']?>
			</h2>
			<?=$tbl_maintext['body']?>
        </div>

    
			
			
			
			
<?php require_once('templates/bottom.php') ?>  

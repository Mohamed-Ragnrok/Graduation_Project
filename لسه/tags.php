<?php 
session_start();
ob_start();
include "init.php"; 
?>
		
<div class="container">
	<?php
		if(isset($_GET['name'])){
			$tagname = $_GET['name'] ;
			echo '<h1 class="text-center">'. $tagname .'</h1>'; ?>

	<div class="row">
			<?php
			$tagsItem = getAllFrom("*","items","WHERE tags LIKE '%$tagname%' AND Approve = 1","Item_ID") ;
				foreach ($tagsItem as $tag ) {
					echo '<div class ="col-sm-6 col-md-3">';
						echo '<div class ="thumbnail item-box">';
							echo '<span class = "price-tag">'.$tag['Price'].'</span>';
							
							if (empty($tag['img_item'])){
								echo '<img class = "img-responsive" src="img.png" alt="" />';
							
							}else{
								echo '<img class = "img-responsive" src="admin\uplodes\image_item\\'.$tag['img_item'].'" alt="" />';
							}

							echo '<div class = "caption">';
								echo '<h3><a href="items.php?itemid='.$tag['Item_ID'] .'">'. $tag['Name'] . '</a></h3>';
								echo '<p>' . $tag['Description'] . '</p>';
								echo '<div class= "date">' . $tag['Add_Date'] . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			
		}else{
			echo '<div class="alert alert-danger"> You Must Enter Tag Name</div>';
		}
		?>
	</div>
</div>


<?php 
include $tbl ."footer.php"; 
ob_end_flush();
?>
	

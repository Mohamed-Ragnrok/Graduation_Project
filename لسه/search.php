<?php 
session_start();
ob_start();
$pageTitle = 'Search ..';
include "init.php"; 
?>
		
<div class="container">
	
	
		<?php
 
		if(isset($_GET['search'])){
			
			if(!empty(filter_var($_GET['search'] , FILTER_SANITIZE_STRING))){

				$search = filter_var($_GET['search'] , FILTER_SANITIZE_STRING);
				$v =filter_var($_GET['search_in'] , FILTER_SANITIZE_STRING);
				if($v == "all" || $v == 0){
					$search_in = '';
				}else{
					$search_in = "AND cat_ID =$v";
				}

				echo '<h1 class="text-center">Search for '. $search .'</h1>';
				echo '<div class="row">';
				$searchItem = getAllFrom("*","items","WHERE Name LIKE '%$search%' AND Approve = 1 $search_in","Item_ID") ;
					foreach ($searchItem as $search ) {
						echo '<div class ="col-sm-6 col-md-3">';
							echo '<div class ="thumbnail item-box">';
								echo '<span class = "price-tag">$'.$search['Price'].'</span>';
								
								if (empty($search['img_item'])){
									echo '<img class = "img-responsive" src="img.png" alt="" />';
								
								}else{
									echo '<img class = "img-responsive" src="admin\uplodes\image_item\\'.$search['img_item'].'" alt="" />';
								}

								echo '<div class = "caption">';
									echo '<h3><a href="items.php?itemid='.$search['Item_ID'] .'">'. $search['Name'] . '</a></h3>';
									echo '<p>' . $search['Description'] . '</p>';
									echo '<div class= "date">' . $search['Add_Date'] . '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
			}else{
				echo '<div class="alert alert-danger"> Please Enter Search Name</div>';
			}
			
		}else{
			echo '<div class="alert alert-danger"> You Must Enter Search Name</div>';
		}
		?>
	</div> <!-- end div row -->
</div>


<?php 
include $tbl ."footer.php"; 
ob_end_flush();
?>
	

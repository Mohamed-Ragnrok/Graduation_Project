<?php
session_start();
ob_start();
$pageTitle = 'Show Profile';
include "init.php";
 //Chech If Get Request userid Is Numeric & Get The Integer Value Of It 
$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

$stmt = $connectDB->prepare("SELECT *
							From users
						  	WHERE UserID = ? AND RegStatus = 1 ");
// Execute Query
$stmt->execute(array($userid));

$count=$stmt->rowCount();

if($count > 0){
		// Fetch The Data
		$user = $stmt->fetch();
	?>
		<h1 class="text-center">Profile <?php echo $user['UserName'];?></h1>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<img class = "img-responsive img-thumbnail center-block" src="admin/uplodes/avatars/<?php echo $user['avatar']; ?>"  alt="User Image" />
				</div>
				<div class="col-md-9 item-info">
					<h2><?php echo $user['UserName'] ?></h2>
					<p><?php echo $user['FullName'] ?></p>
					<ul class="list-unstyled">
				
						<li>
						 	<i class="far fa-envelope fa-fw"></i>
							<span>Email</span> : <?php echo $user['Email'] ?> </li>
						<li>

						<li>
							<i class="far fa-calendar-alt fa-fw"></i>
							<span>Register Date</span> : <?php echo $user['Date'] ?> 
						</li>

					</ul>
				</div>
			</div>
			<hr class="custom-hr">
		</div>
			<div id="my-ads" class="my-ads block">
				<div class="container">
					<div class="panel panel-primary">
						<div class="panel-heading">My Items</div>
						<div class="panel-body">
							<?php   
							$myItems = getAllFrom( "*" , "items" , "WHERE user_ID={$user['UserID']} AND Approve = 1" , "Item_ID");
							if(!empty($myItems)){
								echo '<div class="row">';
								foreach ($myItems as $item ) {
									echo '<div class ="col-sm-6 col-md-3">';
										echo '<div class ="thumbnail item-box">';
											
											echo '<span class = "price-tag">'.$item['Price'].'</span>';
											echo '<img class = "img-responsive" src="admin\uplodes\image_item\\'. $item["img_item"] .'" alt="" />';
											echo '<div class = "caption">';
												echo '<h3><a href="items.php?itemid='.$item['Item_ID'] .'">'. $item['Name'] . '</a></h3>';
												echo '<p>' . $item['Description'] . '</p>';
												echo '<div class= "date">' . $item['Add_Date'] . '</div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}
								echo '</div>';
							}else{
								echo 'Sorry There\'s No Ads To Show';
							}
							?>
						
						</div>
					</div>
				</div>
			</div>
<?php
 }else{
	echo '<div class = "container">';
		echo '<div class ="alert alert-danger">There\'s No Such ID Or This User Is Waiting for activation</div>';
	echo '</div>';
 }		
include $tbl ."footer.php"; 
ob_end_flush();
?>

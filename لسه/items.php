<?php
session_start();
ob_start();
$pageTitle = 'Show Items';
include "init.php";
 //Chech If Get Request itemid Is Numeric & Get The Integer Value Of It 
$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0 ;

$stmt = $connectDB->prepare("SELECT items.* , categories.Name AS catname , users.UserName , users.UserID
							From items , categories ,users
						  	WHERE Item_ID = ? AND Approve = 1 AND items.cat_ID = categories.Cat_ID AND items.user_ID = users.UserID ");
// Execute Query
$stmt->execute(array($itemid));

$count=$stmt->rowCount();


if($count > 0 ){
	// Fetch The Data
	$item=$stmt->fetch();

 ?>
		<br><br>
		<h1 class="text-center"><?php echo $item['Name'];?></h1>
		<div class="container">
				<div class="row">
				<div class="col-md-3">
					<img class = "img-responsive img-thumbnail center-block" src="admin\uplodes\image_item\<?php echo $item['img_item'] ?>" alt="" />
				</div>
				<div class="col-md-9 item-info">
					<h2><?php echo $item['Name'] ?></h2>
					<p><?php echo $item['Description'] ?></p>
					<ul class="list-unstyled">
						<li>
							<i class="far fa-calendar-alt fa-fw"></i>
							<span> Added Date</span> : <?php echo $item['Add_Date'] ?>
						</li>
						<li>
							<i class="far fa-money-bill-alt fa-fw"></i>
							<span>Price</span> : $<?php echo $item['Price'] ?>
						</li>
						<li>
							<i class="far fa-building fa-fw"></i>
							<span>Made In</span> : <?php echo $item['Country_Made'] ?>
						</li>
						<li>
							<i class="fas fa-tags fa-fw"></i>
							<span>Category</span> : <a href ="categories.php?pageid=<?php echo $item['cat_ID'] ?>"><?php echo $item['catname'] ?></a>
						</li>
						<li>
							<i class="fas fa-user fa-fw"></i>
							<span>Added By</span> : <a href ="view_profile.php?userid=<?php echo $item['UserID'] ?>"><?php echo $item['UserName'] ?></a>
						</li>
						<li class="tags-item">
							<i class="fas fa-user fa-fw "></i>
							<span>Tags</span> :
							<?php
								$allTags = explode("," , $item['tags']);
								foreach($allTags as $tag){
									$tag = str_replace(' ' , '' , $tag );
									$lowertag =strtolower($tag);
									if(!empty($tag)){
									echo "<a href='tags.php?name={$lowertag}'>" . $tag . '</a>';
									}
								}

							?>
						</li>

						<?php
						if(isset($_SESSION['user'])){
						 if($_SESSION['user'] == $item['UserName'] ){ ?>
							<a href="items_edit.php?do=Edit&itemid=<?php echo $item['Item_ID'] ?>" class="btn btn-default">Edit Item</a>
						<?php } } ?>

					</ul>
				</div>
			</div>
			<hr class="custom-hr">
		<?php if(isset($_SESSION['user'])){  ?>
				<!-- Start Add Comment -->
				<div class="row">
					<div class="col-md-offset-3">
						<div class="add-comment">
							<h3>Add Your Comment</h3>
							<form action="<?php echo $_SERVER['PHP_SELF'] . '?itemid=' . $item['Item_ID'] ?>" method="POST">
								<textarea name="comment" required></textarea>
								<input class="btn btn-primary" type="submit" value="Add Comment" >
							</form>

							<?php    
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								$comment = filter_var($_POST['comment'] , FILTER_SANITIZE_STRING);
								$itemid = $item['Item_ID'];
								$userid = $_SESSION['uid'];

								if(!empty($comment)){
									$stmt = $connectDB->prepare("INSERT INTO comments
															(comment , status , Com_date , item_ID  , user_ID )
														VALUES(:xcomment , 0 , now() , :xitemid , :xuserid )");

									$stmt->execute(array(
								   'xcomment' => $comment ,
								   'xitemid' => $itemid ,
								   'xuserid' => $userid  
									));

									if($stmt){
										echo '<div class="alert alert-success">Comment Added</div>';
									}

								}else{
									echo '<div class="alert alert-danger">You Must Add Comment</div>';
								}

							}
							?>

						</div>
					</div>		
				</div>
				<!-- End Add Comment -->
		<?php }else{

				echo '<a href="login.php">Login</a> Or <a href="login.php">Register</a> To Add Comment';
		} ?>
			<hr class="custom-hr">
				<?php
			 
			   		$comments = getAllFrom( " comments.* ,users.UserName AS Member , users.avatar ,users.UserID " , " comments , users " , "WHERE item_ID={$item['Item_ID']} AND status = 1  AND users.UserID = comments.user_ID " , "Com_ID" , "ASC");
			   		foreach ($comments as $comment ) { ?>

		   			<div class="comment-box">
			   			<div class="row">
			   				<div class="col-sm-2 text-center"> 
			   					<img class = "img-responsive img-thumbnail img-circle center-block" src="admin/uplodes/avatars/<?php echo $comment['avatar']; ?>" alt=""  />
			   					<a href="view_profile.php?userid=<?php echo$comment['UserID'] ?>"><?php echo$comment['Member']; ?> </a>
			   				</div>
			   				<div class="col-sm-10">
			   				 <p class="lead"> <?php echo $comment['comment']; ?> </p> 
			   				</div>
			   			</div>
		   			</div>
		   			<hr class="custom-hr">
			   	<?php	}?>
				
			
		</div>

<?php

}else{
	echo '<div class = "container">';
		echo '<div class ="alert alert-danger">There\'s No Such ID Or This Item Is Waiting Approve</div>';
	echo '</div>';
}



include $tbl ."footer.php"; 
ob_end_flush();
?>
	

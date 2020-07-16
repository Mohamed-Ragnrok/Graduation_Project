<?php
session_start();
ob_start();
$pageTitle = 'Create New Item';
include "init.php";
if(isset($_SESSION['user'])){

	$stmt = $connectDB->prepare("SELECT UserID
								From users
							  	WHERE UserID = ? AND RegStatus = 1 ");
	// Execute Query
	$stmt->execute(array($_SESSION['uid']));

	$count=$stmt->rowCount();

	if($count > 0){

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$name 		= filter_var($_POST['name'] , FILTER_SANITIZE_STRING );
			$desc 		= filter_var($_POST['description'] , FILTER_SANITIZE_STRING );
			$price 		= filter_var($_POST['price'] , FILTER_SANITIZE_NUMBER_INT );
			$country 	= filter_var($_POST['country'] , FILTER_SANITIZE_STRING );
			$status 	= filter_var($_POST['status'] , FILTER_SANITIZE_NUMBER_INT );
			$category 	= filter_var($_POST['category'] , FILTER_SANITIZE_NUMBER_INT );
			$tags		= filter_var($_POST['tags'] , FILTER_SANITIZE_STRING );


			// Uplode Variables
			$imgName = $_FILES['img_item']['name'];
			$imgSize = $_FILES['img_item']['size'];
			$imgTmp = $_FILES['img_item']['tmp_name'];
			$imgType = $_FILES['img_item']['type'];
			
			// List Of Allowed File Typed To Uplode
			$imgAllowedExtension = array("jpeg" , "jpg"  , "png" , "gif");

			// Get Avatar Extension
			$imgExtension = explode('.', $imgName);
			$lower = strtolower(end($imgExtension));


			$formErrors =array();

			if(strlen($name)<4) { $formErrors[]= 'Items Title Must Be At Least <strong>4 Characters</strong>';}
			if(strlen($desc)<10){ $formErrors[]= 'Items Description Must Be At Least <strong>10 Characters</strong> ';}
			if(empty($price))   { $formErrors[]= 'Price Can\'t be <strong>Empty</strong> '      ;}
			if(empty($country)) { $formErrors[]= 'country Can\'t be <strong>Empty</strong> '    ;}
			if(empty($status))  {$formErrors []= 'Item Status Must Be Not Empty'			   ;}
			if(empty($category)){$formErrors []= 'Item Category Must Be Not Empty'			   ;}


			if( !empty($imgName) && !in_array($lower, $imgAllowedExtension)){
				$formErrors[]= 'This Extension Is Not <strong> Allowed </strong> ';
			}
			if(empty($imgName)){
				$formErrors[]= 'Image Is <strong> Required </strong> ';
			}
			if($imgSize > 2097152){
				$formErrors[]= 'Image Cant Be Larger Than <strong> 2MB </strong> ';
			}

			//Check If Thers's No Erorr Proceed The Update Operation
			if(empty($formErrors)) {

				$image = rand(0 , 100000000) . '_' . $imgName;
				move_uploaded_file($imgTmp, "admin/uplodes/image_item/".$image);

				// Insert Userinfo In Database
				$stmt = $connectDB->prepare("INSERT INTO items
												(Name , img_item ,Description ,Price ,Country_Made ,Status ,Add_Date ,user_ID ,cat_ID ,tags )
											VALUES(:xname , :ximg , :xdesc , :xprice , :xcountry ,:xstatus ,now() ,:xmember ,:xcat ,:xtags ) ");
				$stmt->execute(array(
					   'xname'    => $name    ,
					   'ximg'	  => $image   ,
					   'xdesc'    => $desc 	  ,
					   'xprice'   => $price   ,
					   'xcountry' => $country ,
					   'xstatus'  => $status  ,
					   'xmember'  => $_SESSION['uid']  ,
					   'xcat'     => $category ,
					   'xtags'	  => $tags 


				));
				//Echo Success Message 
				if($stmt){
					$succesMsg = '<strong>Add Item<strong>' ;
				}		

			}

		}
		

		?>
		<h1 id="item" class="text-center"><?php echo $pageTitle; ?></h1>

		<div class="create-ad block">
			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo $pageTitle; ?></div>
					<div class="panel-body">
						<!-- Start Looping Through Errors -->
						<?php
							if(!empty($formErrors)){
								foreach($formErrors as $error){
									echo '<div class="alert alert-danger">'.$error.'</div>'; 
								}
							}

							if (isset($succesMsg)){
		 						echo '<div class="alert alert-success">' . $succesMsg . '</div>';
		 						}


							
						?>
						<!-- End Looping Through Errors -->
						<div class="row"> 
							<div class="col-md-8">
								<form class="form-horizontal main-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
									<!-- Start Name Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Name</label>
										<div class="col-sm-10 col-md-9">
											<input pattern=".{4,}" title="This Field Require At Least 4 Characters" type="text" name="name" class="form-control live"  placeholder="Name Of The Item "  data-class=".live-title" value ="<?php if(isset($name)){echo $name;} ?>" required />	

										</div>
									</div>
									<!-- End Name Filed -->

									<!-- Start img_item Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Image Item</label>
										<div class="col-sm-10 col-md-9">
											<input type="file" name="img_item" class="form-control-file live"  required="required" />	

										</div>
									</div>
									<!-- End img_item Filed -->	

									<!-- Start Description Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Description</label>
										<div class="col-sm-10 col-md-9">
											<textarea pattern=".{10,}" title="This Field Require At Least 10 Characters" type="text" name="description" class="form-control live"  placeholder="Description Of The Item " data-class=".live-desc" required><?php if(isset($desc)){echo $desc;} ?></textarea>	

										</div>
									</div>
									<!-- End Description Filed -->
									<!-- Start Price Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Price</label>
										<div class="col-sm-10 col-md-9">
											<input type="text" name="price" class="form-control live"  placeholder="Price Of The Item "  data-class=".live-price" value ="<?php if(isset($price)){echo $price;} ?>" required/>	

										</div>
									</div>
									<!-- End Price Filed -->
									<!-- Start Country Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Country</label>
										<div class="col-sm-10 col-md-9">
											<input type="text" name="country" class="form-control"  placeholder="Country Of Meda " value ="<?php if(isset($country)){echo $country;} ?>"  required/>	

										</div>
									</div>
									<!-- End Country Filed -->
									<!-- Start Status Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Status</label>
										<div class="col-sm-10 col-md-9">
											<select  name="status" required>
												<option value="">...</option>
												<option value="1">New</option>
												<option value="2">Like New</option>
												<option value="3">Used</option>	
												<option value="4">Old</option>	
											</select>	
										</div>
									</div>
									<!-- End Status Filed -->
									<!-- Start categories Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Category</label>
										<div class="col-sm-10 col-md-9">
											<select  name="category" required>
												<option value="">...</option>
												<?php
											   		$allcats = getAllFrom("*" , "categories" , "WHERE parent = 0"  ,"Cat_ID" ,"ASC");
											   		foreach ($allcats as $cat) {
											   			echo '<option  value="">'.$cat['Name'] .'</option>';

											   			$allchild = getAllFrom("*" , "categories" , "WHERE parent = {$cat['Cat_ID']}"  ,"Cat_ID" ,"ASC");
											   			foreach($allchild as $child){
											   				echo '<option value ="'. $child['Cat_ID'] .'">--'.$child['Name'] .'</option>';
											   			}
											   		}

												?>
											</select>	
                                            <p>اختر من الاقسام الفرعية فقط </p>
										</div>
									</div>
									<!-- End categories Filed -->
									<!-- Start Tags Filed --> 
									<div class="form-group form-group-lg">
										<label class="col-sm-3 control-lable">Tags</label>
										<div class="col-sm-10 col-md-9">
											<input type="text" name="tags" class="form-control"  placeholder="Separate Tags With Comma ( , )" value ="<?php if(isset($tags)){echo $tags;} ?>" />	

										</div>
									</div>
									<!-- End Tags Filed -->
									<!-- Start submit Filed --> 
									<div class="form-group form-group-lg">
											
										<div class="col-sm-offset-3 col-sm-9">
											<input type="submit" value="Add Item" class="btn btn-primary btn-lg"/>	
										</div>
									</div>
									<!-- End submit Filed -->        				       				       				
								</form>


							</div>
							<div class="col-md-4">
								<div class ="thumbnail item-box live-preview">
									<span class = "price-tag">
										$<span class="live-price">0</span>
									</span>
									<img class = "img-responsive" src="img.png" alt="" />
									<div class = "caption">
										<h3 class="live-title">Title</h3>
										<p class="live-desc">Description</p>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		

	<?php
	}else{
		echo '<div class = "container">';
			echo '<div class ="alert alert-danger">Unable to create ad, user is waiting for activation</div>';
		echo '</div>';
	}

}else{
	header('Location: login.php');
	exit();
	
}
include $tbl ."footer.php"; 
ob_end_flush();
?>
	

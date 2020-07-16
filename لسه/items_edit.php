<?php
    session_start();
	ob_start(); // Output Buffering Start

	$pageTitle = 'Edit Items';

	if (isset($_SESSION['user'])) {
		
		include "init.php";


		$do = isset($_GET['do']) ? $_GET['do'] :'';
		if($do == 'Edit'){
			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0 ;
			$stmt = $connectDB->prepare("SELECT * From items  WHERE Item_ID = ? ");
			// Execute Query
			$stmt->execute(array($itemid));
			// Fetch The Data
			$item = $stmt->fetch(); 
			// The Row Count
			$count = $stmt->rowCount();
			// If There's Such ID Show The Form
			if ($count > 0 && $_SESSION['uid'] == $item['user_ID']) { 
 
  		?>
		   		<h1 class="text-center">Edit Item</h1>

				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="itemid" value="<?php echo $itemid ; ?>">
						<!-- Start Name Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Name</label>
							<div class="col-sm-10 col-md-6">
								<input  name="name" class="form-control"  placeholder="Name Of The Item " required="required" value="<?php echo $item['Name'] ?>" />	

							</div>
						</div>
						<!-- End Name Filed -->
						<!-- Start img_item Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Image Item</label>
							<div class="col-sm-10 col-md-6">
								<input  type="file" name="img_item" class="form-control" />	
								<?php echo $item['img_item']; ?>
								<input type="hidden" name="item_img_now" value="<?php echo $item['img_item']; ?>">

							</div>
						</div>
						<!-- End img_item Filed -->
						<!-- Start Description Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Description</label>
							<div class="col-sm-10 col-md-6">
								<textarea name="description" class="form-control"  placeholder="Description Of The Item " required="required" ><?php echo $item['Description'] ?></textarea>

							</div>
						</div>
						<!-- End Description Filed -->
						<!-- Start Price Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Price</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="price" class="form-control"  placeholder="Price Of The Item " required="required" value="<?php echo $item['Price'] ?>" />	

							</div>
						</div>
						<!-- End Price Filed -->
						<!-- Start Country Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Country</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="country" class="form-control"  placeholder="Country Of Meda " required="required" value="<?php echo $item['Country_Made'] ?>" />	

							</div>
						</div>
						<!-- End Country Filed -->
						<!-- Start Status Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Status</label>
							<div class="col-sm-10 col-md-6">
								<select  name="status" >
									<option value="1" <?php if($item['Status']==1){echo "selected";} ?> >New</option>
									<option value="2" <?php if($item['Status']==2){echo "selected";} ?> >Like New</option>
									<option value="3" <?php if($item['Status']==3){echo "selected";} ?> >Used</option>	
									<option value="4" <?php if($item['Status']==4){echo "selected";} ?> >Old</option>	
								</select>	
							</div>
						</div>
						<!-- End Status Filed -->
						<!-- Start Member Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Member</label>
							<div class="col-sm-10 col-md-6">
								<select  name="member"  >
									<?php

								   		$users = getAllFrom("*" , "users" , "WHERE RegStatus != 0"  ,"UserID" ,"ASC");
								   		foreach ($users as $user) {

								   			echo '<option value ="'. $user['UserID'] .'" ';
								   			if($item['user_ID']== $user['UserID'] ){echo "selected";} 
								   			echo '>'. $user['UserName'] .'</option>';
								   		}

									?>
								</select>	
							</div>
						</div>
						<!-- End Member Filed -->
						<!-- Start categories Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Category</label>
							<div class="col-sm-10 col-md-6">
								<select  name="category">
									<?php

								   		$cats = getAllFrom("*" , "categories" , ""  ,"Cat_ID" ,"ASC");
								   		foreach ($cats as $cat) {
								   			echo '<option value ="'. $cat['Cat_ID'] .'"'; 
								   			if($item['cat_ID'] == $cat['Cat_ID']){echo "selected" ;}
								   			echo '>'.$cat['Name'] .'</option>';
								   		}

									?>
								</select>	
							</div>
						</div>
						<!-- End categories Filed -->
						<!-- Start Tags Filed --> 
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-lable">Tags</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="tags" class="form-control"  placeholder="Separate Tags With Comma ( , )" value="<?php echo $item['tags'] ?>" />	

							</div>
						</div>
						<!-- End Tags Filed -->
						<!-- Start submit Filed --> 
						<div class="form-group form-group-lg">
								
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" value="Save Item" class="btn btn-primary btn-lg"/>	
							</div>
						</div>
						<!-- End submit Filed -->        				       				       				
					</form>

					<?php 

			}else{

				echo '<div class="container">';
				$theMsg = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirectHome($theMsg,5);
				echo "</div>";

			}

	    }elseif($do == 'Update'){// Update Page

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Get Variables Form The Form
				$id 	= $_POST['itemid'];
				$name 	= $_POST['name'];
				$desc 	= $_POST['description'];
				$price 	= $_POST['price'];
				$country= $_POST['country'];
				$status = $_POST['status'];
				$member = $_POST['member'];
				$category = $_POST['category'];
				$tags = $_POST['tags'];
				$item_image = $_POST['item_img_now'];


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




				// Validata The Form
				$formErorrs = array();

				if(empty($name))   { $formErorrs[]='Name Can\'t be <strong>Empty</strong> '	      ;	}
				if(empty($desc))   { $formErorrs[]='Description Can\'t be <strong>Empty</strong> ';	}
				if(empty($price))  { $formErorrs[]='Price Can\'t be <strong>Empty</strong> '      ;	}
				if(empty($country)){ $formErorrs[]='country Can\'t be <strong>Empty</strong> '    ;	}
				if($status   == 0)   { $formErorrs[]='You Must Choose The <strong>status</strong> ' ;}	
				if($member   == 0)   { $formErorrs[]='You Must Choose The <strong>Member</strong> ' ;}	
				if($category == 0)   { $formErorrs[]='You Must Choose The <strong>Cat</strong> '    ;}	

				if( !empty($imgName) && !in_array($lower, $imgAllowedExtension)){
					$formErorrs[]= 'This Extension Is Not <strong> Allowed </strong> ';
				}
				if($imgSize > 2097152){
					$formErorrs[]= 'image Cant Be Larger Than <strong> 2MB </strong> ';
				}


				// Loop Into Errors Array And Echo It
				foreach ($formErorrs as $erorr ) {
					echo '<div class="alert alert-danger">' . $erorr . '</div>';
				}
					
				//Check If Thers's No Erorr Proceed The Update Operation
				if(empty($formErorrs)) {

					if(!empty($_FILES['img_item']['name'])){
						$image = rand(0 , 100000000) . '_' . $imgName;
						move_uploaded_file($imgTmp, "admin/uplodes/image_item/".$image); 
					}else{ 	
						$image = $item_image ;	 
					}

					// Updata The Database With This Info
					$stmt = $connectDB->prepare("UPDATE items SET Name=?, img_item=? , Description=?, Price=?, Country_Made =?,Status=? , user_ID=?, cat_ID=? , tags=? WHERE Item_ID = ?");
					$stmt->execute(array($name ,$image , $desc , $price , $country , $status , $member , $category , $tags , $id));
					//Echo Success Message 
					$theMsg = '<div class="alert alert-success">'.$stmt->rowCount() .' Record Updated</div>'; 

					redirectHome($theMsg ,'back' ,3);
				}

			}else{

				$theMsg = '<div class="alert alert-danger"> Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg,5);
			}


			echo "</div>";
		
		}

		include $tbl ."footer.php";
	}else{

		header('Location: index.php');

		exit();
	}



	ob_end_flush(); // Release The Output

?>
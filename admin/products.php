<?php

require 'config.php';
$noti = "";
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $image = $_FILES['file']['name'];
    $filepath = "./productImages/" . $_FILES['file']['name'];
    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];
    $cat_id = $_POST['category_id'];
    $tag = json_encode($_POST['tag']);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        $query = "INSERT INTO products(name,price,image,short_desc,long_desc,category_id)
		VALUES('$product_name','$product_price','$image','$short_description','$long_description','$cat_id')";
        if (mysqli_query($conn, $query)) {
            $id = mysqli_insert_id($conn);
            $query1 = "INSERT INTO products_tags(product_id,tag_id)VALUES('$id','$tag')";
            if (mysqli_query($conn, $query1)) {
                $noti .= "<div class='notification success png_bg'>";
                $noti .= "<a href='#' class='close'><img src='resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>";
                $noti .= "<div>Product Successfully Added</div></div>";
            } else {
                $noti .= "<div class='notification error png_bg'>";
                $noti .= "<a href='#' class='close'><img src='resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>";
                $noti .= "<div>Something Happening Wrong!! Product Not Added</div></div>";
            }
        }

    } else {
        $noti .= "<div class='notification error png_bg'>";
        $noti .= "<a href='#' class='close'><img src='resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>";
        $noti .= "<div>Image Not Uploaded </div></div>";
    }

}
?>
<?php include 'header.php'?>
<?php include 'sidebar.php'?>

		<div id="main-content"> <!-- Main Content Section with everything -->

			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>

			<!-- Page Head -->
			<h2>Welcome Admin</h2>
			<p id="page-intro">What would you like to do?</p>

			<?php echo $noti ?>
			<div class="clear"></div> <!-- End .clear -->

			<div class="content-box"><!-- Start Content Box -->

				<div class="content-box-header">

					<h3>Manage Product</h3>

					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add</a></li>
					</ul>

					<div class="clear"></div>

				</div> <!-- End .content-box-header -->

				<div class="content-box-content">

					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>

						<table>

							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Column 1</th>
								   <th>Column 2</th>
								   <th>Column 3</th>
								   <th>Column 4</th>
								   <th>Column 5</th>
								</tr>

							</thead>

							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>

										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>

							<tbody>
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>

								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Consectetur adipiscing</td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
							</tbody>

						</table>

					</div> <!-- End #tab1 -->

					<div class="tab-content" id="tab2">

						<form action="products.php" method="post" enctype="multipart/form-data">

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								<p>
									<label>Product Name</label>
										<input class="text-input small-input" type="text" id="small-input" name="product_name" required/>  <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Product Price</label>
										<input class="text-input small-input" type="number" id="small-input" name="product_price" required/>  <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Product Image</label>
										<input class="text-input small-input" type="file" id="small-input" name="file" required/>  <!-- Classes for input-notification: success, error, information, attention -->
								</p>

								<p>
									<label>Product Category</label>
								<?php
								require './config.php';
								$query = "select * from categories";
								$result = mysqli_query($conn, $query);
								if (mysqli_num_rows($result) > 0)
								{
									$html = "";
									$html .= "<select name='category_id' class='small-input'>";
									while ($row = mysqli_fetch_assoc($result))
									{
										$category_id = $row['id'];
										$category_name = $row['name'];
										$html .= "<option value='$category_id'>$category_name</option>";

									}
									$html .= "</select>";
									echo $html;
								}

								?>
								</p>

								<p>
									<label>Tags</label>
									<?php
									require './config.php';
									$query = "select * from tags";
									$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0)
									{
										$tag = "";
										while ($row = mysqli_fetch_assoc($result))
										{
											$tag_id = $row['id'];
											$tag_name = $row['name'];

											$tag .= "<input type='checkbox' name='tag[]' value='$tag_id' /> $tag_name";

										}
										echo $tag;
									}

									?>

								</p>
								<p>
									<label>Product Short Description</label>
										<input class="text-input small-input" type="text" id="small-input" name="short_description" required/>  <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Product Long Description</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="long_description" cols="79" rows="15"></textarea>
								</p>




								<p>
									<input class="button" name="submit" type="submit" value="Submit" />
								</p>

								<!-- <p>
									<label>Medium form input</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
								</p>

								<p>
									<label>Large form input</label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p>



								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p> -->





							</fieldset>

							<div class="clear"></div><!-- End .clear -->

						</form>

					</div> <!-- End #tab2 -->

				</div> <!-- End .content-box-content -->

			</div> <!-- End .content-box -->



	<?php include 'footer.php'?>

<?php
include './config.php';
if(isset($_POST['action'])) {
    $choice=$_POST['action'];
    if($choice=="category" ) {
        $cat_id = $_POST['id'];
        $showRecordPerPage = 10;
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $currentPage = $_GET['filter'];
            } else {
                $currentPage = 1;
            }
        $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
        $query = "SELECT * FROM products WHERE category_id='$cat_id' LIMIT $startFrom, $showRecordPerPage";
        $result = mysqli_query($conn, $query);
        $totalProduct = mysqli_num_rows($result);
        $lastPage = ceil($totalProduct / $showRecordPerPage);
        $firstPage = 1;
        $nextPage = $currentPage + 1;
        $previousPage = $currentPage - 1;
        if(mysqli_num_rows($result)> 0) {
                        $output='<div class="aa-product-catg-body">
                                <ul class="aa-product-catg">';
                  while($row = mysqli_fetch_assoc($result)) {
                      $product_id = $row['product_id'];
                      $product_name = $row['name'];
                      $product_image = $row['image'];
                      $product_price = $row['price'];
                      $product_desc = $row['short_desc'];  
                      $output.='<!-- start single product item -->
                                <li>
                                <figure>
                                <a class="aa-product-img" href="#"><img src="../admin/productImages/'.$product_image.'" alt="<?php echo $product_image ?>" width="225px" height="225px"></a>
                                <a class="aa-add-card-btn" href="cart.php?id='.$product_id.'"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                <figcaption>
                                <h4 class="aa-product-title"><a href="#">'.$product_name.' </a></h4>
                                <span class="aa-product-price">$ '.$product_price.'</span><span class="aa-product-price"><del>$65.50</del></span>
                                <p class="aa-product-descrip">'.$product_desc.'</p>
                                </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div>
                                <span class="aa-badge aa-sale" href="#">SALE!</span>

                                <!-- product badge -->

                                </li>';
                    }
                   
                     echo $output;
                } else {
            echo "data not found";
                }
        } else {
        echo "Ghanta lelo";
        }

}

?>
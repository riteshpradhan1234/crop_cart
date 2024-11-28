<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../portal_files/bootstrap.min.css">
    <title>Farmer - Insert Product</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,600');

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            font-family: Raleway, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <main class="my-form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <?php
                            if (isset($_SESSION['phonenumber']) && isset($_GET['id'])) {
                                $id = (int)$_GET['id'];
                                $getting_prod = "SELECT * FROM products WHERE product_id = $id";
                                $run = mysqli_query($con, $getting_prod);

                                if ($details = mysqli_fetch_array($run)) {
                                    $product_title = $details['product_title'];
                                    $product_cat = $details['product_cat'];
                                    $product_type = $details['product_type'];
                                    $product_stock = $details['product_stock'];
                                    $product_price = $details['product_price'];
                                    $product_expiry = $details['product_expiry'];
                                    $product_desc = $details['product_desc'];
                                    $product_keywords = $details['product_keywords'];
                                    $product_delivery = $details['product_delivery'];
                                }
                            ?>
                            <div class="card-header">
                                <h4 class="text-center font-weight-bold">Insert Your New Product <i class="fas fa-leaf"></i></h4>
                            </div>
                            <div class="card-body">
                                <form name="my-form" action="InsertProduct.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Title:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="product_title" placeholder="<?php echo $product_title; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Stock (In kg):</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="product_stock" placeholder="<?php echo $product_stock; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Categories:</label>
                                        <div class="col-md-6">
                                            <select name="product_cat" required>
                                                <option>Select a Category</option>
                                                <?php
                                                $get_cats = "SELECT * FROM categories";
                                                $run_cats = mysqli_query($con, $get_cats);
                                                while ($row_cats = mysqli_fetch_array($run_cats)) {
                                                    $cat_id = $row_cats['cat_id'];
                                                    $cat_title = $row_cats['cat_title'];
                                                    echo "<option value='$cat_id'>$cat_title</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Type:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="product_type" placeholder="Example: potato" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Expiry:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="product_expiry" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Image:</label>
                                        <div class="col-md-6">
                                            <input type="file" name="product_image">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product MRP (Per kg):</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="product_price" placeholder="Enter Product price" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Description:</label>
                                        <div class="col-md-6">
                                            <textarea id="nid_number2" class="form-control" name="product_desc" rows="3" required><?php echo htmlspecialchars($product_desc); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Keywords:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="product_keywords" placeholder="Example: best potatoes" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Delivery:</label>
                                        <div class="col-md-6">
                                            <input type="radio" name="product_delivery" value="yes" <?php echo ($product_delivery == 'yes') ? 'checked' : ''; ?>/> Yes
                                            <input type="radio" name="product_delivery" value="no" <?php echo ($product_delivery == 'no') ? 'checked' : ''; ?>/> No
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" name="insert_pro">
                                            INSERT
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>

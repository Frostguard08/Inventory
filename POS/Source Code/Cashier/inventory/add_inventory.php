<?php

include "../dbcon.php";
include "../randomstring.php";
include "../validation.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    if (!is_dir('./img')) {
      mkdir('./img');
    }

    if (empty($errors)) {
        $image = $_FILES['image'];
        $imagePath = '';

        if ($image) {
            $imagePath = '../inventory/img/'.randomString(8, 1).'/'.$image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $statement = $pdo->prepare("INSERT INTO tbl_inventory (item_name, quantity, price, image, description, status)
        VALUES (:item_name, :quantity, :price, :image, :description, :status)"
        );

        $statement->bindValue(':item_name', $name);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $desc);
        $statement->bindValue(':status', "active");
        $statement->execute();

        header("location:inventory.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/index.css" />
    <?php if ($_SESSION["Roles"] == 'admin'): ?>
    <title>Holiday Cofe and Souvenir Shop | Admin</title>
    <?php else: ?>
    <title>Holiday Cofe and Souvenir Shop | Cashier</title>
    <?php endif;?>
  </head>
  <body>
    <div class="admin-main">
      <div class="admin-image">
        <img
          src="../images/logo_cafe.png"
          alt="admin logo"
          width="120"
          height="100"
        />

        <?php if ($_SESSION["Roles"] == 'admin'): ?>
          <h4>Holiday Cofe and Souvenir Shop</h4>
        <?php else: ?>
          <h4>Welcome to Cashier!</h4>
        <?php endif;?>
      </div>
      <ul>
        <li><a href="../order/order.php">Transactions</a></li>
        <li class="disabled" ><a href="../inventory/inventory.php">Inventory</a></li>
        <li><a href="../view_orders/viewitem.php">View Records</a></li>
        <?php if ($_SESSION["Roles"] == 'admin'): ?>

        <?php endif;?>
        <li class="logout"><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="admin-contents">
      <div class="navbar">
        <li><a href="inventory.php">View Items</a></li>
        <li class="disabled"><a href="">Add Items</a></li>
        <li><a href="out_stock.php">Out of Stock</a></li>
        <li><a href="archive_items.php">Archive Items</a></li>
      </div>
      <div class="add-form">
        <form method="POST" action="" enctype="multipart/form-data">
            <label class="form-label">Product Image</label>
            <input
              type="file"
              class="form-control"
              name="image"
            />
            <label for="">Items Name:</label>
            <input
              type="text"
              class="form-control"
              name="name"
              required
            />
            <label for="">Description:</label>
            <textarea
              type="text"
              class="form-control"
              name="description"
              required
            ></textarea>
            <label for="">Quantity:</label>
            <input
              type="number"
              min="0"
              class="form-control"
              name="quantity"
              required
            />
            <label for="">Price:</label>
            <input
              type="number"
              min="0"
              class="form-control"
              name="price"
              required
            />
          <div class="buttons-form">
            <input type="submit" class="btn" value="Add Item" />
            <!-- <input type="submit" class="btn" value="Delete Item" /> -->
            <input type="reset" class="btn" value="Cancel" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

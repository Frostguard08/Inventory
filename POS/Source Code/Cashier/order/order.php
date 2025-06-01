<?php

include "../dbcon.php";
include "../validation.php";

$search = $_GET['search'] ?? '';


if ($search) {
  $statement = $pdo->prepare('SELECT * FROM tbl_inventory where item_name like :INAME or description like :INAME and quantity >= 2 and status = "active" order by item_id desc');
  $statement->bindValue(':INAME', "%$search%");
  $search = "";
}
else {
  $statement = $pdo->prepare('SELECT * FROM tbl_inventory where quantity != 0 and status = "active" order by item_id desc');
}

$statement->execute();
$inventory = $statement->fetchAll(PDO::FETCH_ASSOC);

$errors = [];
// echo '<pre>';
// var_dump($inventory);
// echo '<pre>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['items'];
    $quantity = $_POST['quantity'];
    $existingquantity = 0;
    $newquantity = 0;

    $statement = $pdo->prepare('SELECT * FROM tbl_inventory WHERE item_id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    $selected_prod = $statement->fetch(PDO::FETCH_ASSOC);
    $existingquantity = $selected_prod['quantity'];
    $item_name = $selected_prod['item_name'];
    // $item_price = $quantity * $selected_prod['price'];
    $item_price = $selected_prod['price'];
    $item_image = $selected_prod['image'];

    if ($quantity <= $existingquantity) {
        $newquantity = $existingquantity - $quantity;
        $statement = $pdo->prepare("UPDATE tbl_inventory set quantity = :IQUAN WHERE item_id = :id");
        $statement->bindValue(':IQUAN', $newquantity);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $statement = $pdo->prepare("INSERT INTO tbl_orderconfirm (item_image, item_name, item_id, amount, quantity)
        VALUES (:item_image, :item_name, :item_id, :amount, :quantity)"
        );

        $statement->bindValue(':item_image', $item_image);
        $statement->bindValue(':item_name', $item_name);
        $statement->bindValue(':item_id', $id);
        $statement->bindValue(':amount', $item_price);
        $statement->bindValue(':quantity', $quantity);
        $statement->execute();

        header("location:order.php");
    } else {
      echo "<script>alert('Exceed Stock'); window.location = 'order.php';</script>";
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
        <li class="disabled"><a href="order.php">Transactions</a></li>
        <li><a href="../inventory/inventory.php">Inventory</a></li>
        <li><a href="../view_orders/viewitem.php">View Records</a></li>
        <?php if ($_SESSION["Roles"] == 'admin'): ?>

        <?php endif;?>
        <li class="logout"><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="admin-contents">
      <div class="navbar">
        <li><a class="disabled" href="order.php">Order</a></li>
        <li><a href="order_confirm.php">Confirm Order</a></li>
        <li><a href="order_process.php">Order Summary</a></li>
      </div>
      <div class="filter">
        <div class="admin-filter">
          <form action="" method="get">
          <input type="text" 
          class="form-control" 
          name="search" 
          placeholder="Enter Search" 
          value="<?php echo $search; ?>">
          <input type="submit" value="Submit" style="color: white;" />
          </form>
        </div>
      </div>
      <div class="tran-form-card">
        <?php foreach ($inventory as $i => $item): ?>
        <div class="flex-wrapper">
          <form method="POST" action="" class="form-card" >
            <div class="card">
              <img src="<?php echo $item['image']; ?>" alt="item image" style="width:100%;">
              <div class="container">
                <h4><b><?php echo $item['item_name']; ?></b></h4>
                <h4><b>₱ <?php echo number_format($item['price'],  2, '.', ','); ?></b></h4>
                <p><?php echo $item['description']; ?></p>
                <input type="text" name="items" value="<?php echo $item['item_id']; ?>" hidden/>
                <input type="number" min="0" class="form-control" name="quantity" style="margin-right:0;" placeholder="Quantity" required />
                <input type="submit" class="btn" value="Add Order" style="border: none;" />
              </div>
            </div>
          </form>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </body>
</html>

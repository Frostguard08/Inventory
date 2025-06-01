<?php

include "../dbcon.php";
include "../validation.php";

$total_amount = 0;
$total_quantity = 0;
$itemArr = [];


$statement = $pdo->prepare('SELECT * FROM tbl_orderconfirm order by cart_id desc');
$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($_SERVER['REQUEST_METHOD']);
// echo '<pre>';

foreach ($row as $i => $products) {
    $total_quantity += $products['quantity'];
    $total_amount += $products['quantity'] * $products['amount'];

    // array_push($itemArr, $item_detail);
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
        <li class="disabled"><a href="transact.php">Transactions</a></li>
        <li><a href="../inventory/inventory.php">Inventory</a></li>
        <li><a href="../view_orders/viewitem.php">View Records</a></li>
        <?php if ($_SESSION["Roles"] == 'admin'): ?>

        <?php endif;?>
        <li class="logout"><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="admin-contents">
        <div class="navbar">
            <li><a href="order.php">Order</a></li>
            <li><a href="order_confirm.php">Confirm Order</a></li>
            <li><a class="disabled" href="#">Order Summary</a></li>
        </div>
        <div class="admin-tables">
            <form method="POST" action="checkout_order.php">
                <h1>Order Summary</h1>
                <?php foreach ($row as $i => $item): ?>
                    <div style="display: flex; justify-content: space-between;">
                        <p><?php echo $item['item_name']; ?> x<?php echo $item['quantity']; ?></p>
                        <p></p>
                        <p>Amount: ₱ <?php echo number_format($item['amount'],  2, '.', ','); ?></p>
                    </div>
                    <?php endforeach;?>
                    <h5>Total Quantity:  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <?php echo $total_quantity; ?></h5>
                    <h5>Total Amount: &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;₱ <?php echo number_format($total_amount,  2, '.', ','); ?></h5>
                    <div style="display: flex; align-items:center;">
                    <h5>Cash: </h5>
                      <input
                      style="margin-left:1rem; padding:1rem; height:10px; border-radius: 5px;"
                      type="number"
                      min="0"
                      name="cash"
                      required/>
                    </div>
                    <button type="submit" class="btn" style="border:none; color:white;  padding: 0.8rem;">Process Order</button>
            </form>
        </div>
    </div>
  </body>
</html>

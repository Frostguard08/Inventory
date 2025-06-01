<?php  

include "../dbcon.php";
include "../validation.php";



$statement = $pdo->prepare('SELECT * FROM tbl_inventory where quantity = 0 and status = "active" order by item_id desc');


$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);



// echo '<pre>';
// var_dump($row);
// echo '<pre>';



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
        <li class="disabled" ><a href="inventory.php">Inventory</a></li>
        <li><a href="../view_orders/viewitem.php">View Records</a></li>
        <?php if ($_SESSION["Roles"] == 'admin'): ?>

        <?php endif;?>
        <li class="logout"><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="admin-contents">
      <div class="navbar">
        <li><a href="inventory.php">View Items</a></li>
        <?php if ($_SESSION["Roles"] == 'admin'): ?>
        <li><a href="add_inventory.php">Add Items</a></li>
        <?php endif;?>
        <li class="disabled"><a href="#contact">Out of Stock</a></li>
        <li><a href="archive_items.php">Archive Items</a></li>
      </div>
      <div class="admin-tables">

        <table class="inventory">
        <tr>
            <th>Item Code</th>
            <th>Name of Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Stock Status</th>
            <th>Action</th>
        </tr>
          <?php foreach ($row as $i => $item):?>
        <tr>
			<td><?php echo $item['item_id']; ?></td>
			<td><?php echo $item['item_name']; ?></td>
			<td><?php echo $item['quantity']; ?></td>
			<td>₱ <?php echo number_format($item['price'],  2, '.', ','); ?></td>
			<td style="color:red;">Out on Stock</td>
      <td style="padding:1rem;" ><a class="btn" href="update_inventory.php?id=<?php echo $item['item_id']; ?>">Edit</a></td>
      </tr>
        <?php endforeach;?>
        
        </table>
      </div>
    </div>
  </body>
</html>

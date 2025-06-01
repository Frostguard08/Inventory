<?php 
    include "../dbcon.php";
    include "../validation.php";

    $id = $_GET['id'] ?? null;


    $statement = $pdo->prepare('SELECT * FROM tbl_orders where serial_number = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    $row = $row[0];

    // echo '<pre>';
    // var_dump($row);
    // echo '<pre>';

    $orderArr = json_decode($row['inventory_ids']);
    $prodDetial = [];

    foreach ($orderArr as $i => $item) {
        $statement = $pdo->prepare('SELECT * FROM tbl_inventory WHERE item_id = :id');
        $statement->bindValue(':id', $item[0]);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        $product["qty"] = $item[1];

        array_push($prodDetial,  $product);
  }
  
    // echo '<pre>';
    // var_dump($prodDetial);
    // echo '<pre>';

    $balance = $row['cash'] - $row['total_amount'];
    
    echo "<script>window.print();</script>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Print Receipt</title>
</head>
<body>
    <div class="container py-3 bg-light text-black text-start"
        style="line-height: 1rem; max-height: 55vh; overflow-y: auto;">
        <div class="text-center mb-3">
            <small> <strong>Holiday Cafe and Souvenir Shop</strong></small> <br>
            <small><?php echo date("M d, Y", strtotime($row['order_date'])); ?></small><br>
            <small>One Cainta College</small><br>
            <small>Cainta, Rizal</small><br>
            <small>+639-123-456-789</small><br>
        </div>
        <div>
            <table class="table table-borderless table-sm">
                <thead class="border-top border-bottom">
                    <tr>
                        <td scope="col">Item</td>
                        <td scope="col">Qty</td>
                        <td scope="col">Price</td>
                    </tr>
                </thead>
                <tbody class="border-bottom">
                <?php foreach ($prodDetial as $i => $item):?>
                <tr>
                    <td><?php echo $item['item_name']; ?></td>
                    <td><?php echo $item["qty"]; ?></td>
                    <td>₱ <?php echo number_format($item['price'],  2, '.', ','); ?></td>  
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>

        <div class="text-start">
            <small>Total: ₱<?php echo number_format($row['total_amount'],  2, '.', ','); ?></small><br>
            <small>Cash: ₱<?php echo number_format($row['cash'],  2, '.', ','); ?></small><br>
            <small>Balance: ₱<?php echo number_format($balance,  2, '.', ','); ?></small><br>
        </div>

        <div class="text-center mb-2" style="line-height: 0;">
            <hr>
            <small>Thank you please come again!</small>
            <hr>
            <small> Holiday Cafe and Souvenir Shop</small>
        </div>
    </div>
</body>
</html>
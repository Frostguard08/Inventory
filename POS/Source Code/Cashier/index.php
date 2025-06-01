<?php
session_start();
// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
// 	$uri = 'https://';
// } else {
// 	$uri = 'http://';
// }
// $uri .= $_SERVER['HTTP_HOST'];
if (!empty($_SESSION['username'])){
	header('Location: order/order.php');
	exit;
} else {
	header('Location: loginn.php');
	exit;
}
?>
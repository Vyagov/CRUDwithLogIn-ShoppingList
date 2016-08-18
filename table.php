<?php

session_start();
$groceries = !empty($_SESSION['groceries']) ? $_SESSION['groceries'] : [];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Manage Shopping List</title>
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css" />
		<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/js-functions.js"></script>
		<script type="text/javascript" src="assets/js/index.js"></script>
	</head>
	<body>
		<div id="container">
			<h1>Grosseries</h1>
			<div>
				<span>To add rows press the button -</span>
				<button class="fa fa-plus"></button>
			</div>
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</body>
</html>
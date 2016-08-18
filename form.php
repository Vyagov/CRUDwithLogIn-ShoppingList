<?php
require_once 'php-functions.php';
session_start();
$data = [];

if (isset($_SESSION['groceries'])) {
	$data =  $_SESSION['groceries'];
}

$namePr = getFromArray($data, 'namePr');
$qtity = getFromArray($data, 'qtity');
$pr = getFromArray($data, 'pr');

$errors = [];
$errors['namePr'] = '';
$errors['qtity'] = '';
$errors['pr'] = '';
$err = false;

if ($_POST) {
	$namePr = test_input(getFromArray($_POST, 'namePr'));
	$qtity = test_input(getFromArray($_POST, 'qtity'));
	$pr = test_input(getFromArray($_POST, 'pr'));
	
	if (!preg_match('/^[a-zA-Z]*$/', $namePr) || $namePr == '') {
		$errors['namePr'] = 'Input valid product name!';
		$err = true;
	}

	if (!is_numeric($qtity)) {
		$errors['qtity'] = 'Quantity must be a number';
		$err = true;
	}
	if (!is_numeric($pr)) {
		$errors['pr'] = 'Price must be a number';
		$err = true;
	}
	if (!$err) {
		$result = [
			'namePr' => $namePr,
			'qtity' => $qtity,
			'pr' => $pr
		];

		$_SESSION['groceries'][] = $result;
		
		header('Location: table.php');
		die;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Input Shopping List</title>
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css" />
		<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/js-functions.js"></script>
		<script type="text/javascript" src="assets/js/index.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div>
				<h1>Create/Edit row in the table</h1>
				<form id="formCr" action="" method="post">
					<div>
						<label for="namePr">Name of product</label>
						<input class="<?php echo $errors['namePr'] ? 'err' : '';?>" type="text" id="namePr" name="namePr" value="<?= $namePr?>" autofocus="autofocus" />
						<p class="error"><?= $errors['namePr'];?></p>
					</div>
					<div>
						<label for="qtity">Quantity</label>
						<input class="<?php echo $errors['qtity'] ? 'err' : '';?>" type="text" id="qtity" name="qtity" value="<?= $qtity?>" />
						<p class="error"><?= $errors['qtity'];?></p>
					</div>
					<div>
						<label for="pr">Price</label>
						<input class="<?php echo $errors['pr'] ? 'err' : '';?>" type="text" id="pr" name="pr" value="<?= $pr?>" />
						<p class="error"><?= $errors['pr'];?></p>
					</div>
					<div>
						<button>Create/Edit</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
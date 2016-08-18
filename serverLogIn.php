<?php
require_once 'php-functions.php';

$users = [
	['username' => 'user1', 'password' => 'user1pass'],
	['username' => 'user2', 'password' => 'user2pass'],
	['username' => 'user3', 'password' => 'user3pass']
];

$username = getFromArray($_POST, 'user');
$pass = getFromArray($_POST, 'password');

$len = count($users);
$matched = 'false';

for ($i = 0; $i < $len; $i++) {

	if ($users[$i]['username'] === $username) {
		if ($users[$i]['password'] === $pass) {
			$matched = 'true';
			break;
		} 
	} 
}

echo $matched;
<?php 
$db = parse_url(getenv("DATABASE_URL"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));
$id = $_GET["id"];
$data = [
'id' => $ids
];
$stmt = 
	$pdo->prepare("delete from product where pid = :id");
	$stmt->execute($data);
	echo ("delete ok");
 ?>
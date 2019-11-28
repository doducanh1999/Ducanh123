<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
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
	$sql = "select * from product";
	//compile the sql
	$stmt = $pdo->prepare($sql);
	//execute the query on the server and return the result set
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	 ?>
	 <ul>
	 	<?php
            foreach ($resultSet as $row) {
                echo "<li>" .
                 '<a href="delete.php?id=' . $row["nameid"] .  '">' .   $row["name"] 
                        . '--'. $row["age"] 
                . '</a>'
                . "</li>";
            }
        ?>
	 </ul>
</body>
</html>
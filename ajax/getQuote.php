<?php
    include "../dbConnect.php";

    $id = $_POST['id'];

    /*$query = "SELECT * from quotes WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    $quote = rawurlencode(stripslashes($result['quote']));
    $start = $result['start'];*/

    $query = "SELECT `quote`, `author` FROM `quotes` WHERE `id` = ?";
		$statement = $db->prepare($query);
		$statement->bind_param("i", $id);
		$statement->execute();
		$statement->bind_result($quote, $authorID);
		$statement->fetch();
		$statement->free_result();

		$query = "SELECT `author` FROM `quote_authors` WHERE `id` = ?";
		$statement = $db->prepare($query);
		$statement->bind_param("i", $authorID);
		$statement->execute();
		$statement->bind_result($author_name);
		$statement->fetch();
		$statement->free_result();

    $quote .= " - " . $author_name . ".";

    echo json_encode($quote);
?>

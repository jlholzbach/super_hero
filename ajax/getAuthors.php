<?php
    include "../dbConnect.php";

    $authors = array();
    $query = "SELECT * from quote_authors ORDER BY author";
    $result = $db->query($query);

    while($row = $result->fetch_assoc()){
      $authors[] = $row;
    }

    echo json_encode($authors);
?>

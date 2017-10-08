<?
    include "dbConnect.php";

    $search = "%" . $_POST['search'] . "%";

    $all = array();
    $shows = array();
    $movies = array();

    $query = "SELECT * from entertainment WHERE name LIKE ?  ORDER BY name, start ASC, current ASC";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $search);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      $all[] = $row;
    }

    $stmt -> close();

    $query = "SELECT * from entertainment WHERE movie = false AND name LIKE ?  ORDER BY name, start ASC, current ASC";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $search);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      $shows[] = $row;
    }

    $stmt -> close();

    $query = "SELECT * from entertainment WHERE movie = true AND name LIKE ?  ORDER BY name, start ASC, current ASC";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $search);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      $movies[] = $row;
    }

    $stmt -> close();

    $entertainment["all"] = $all;
    $entertainment["movies"] = $movies;
    $entertainment["shows"] = $shows;

    //$entertainment = array();
    echo json_encode($entertainment);

?>

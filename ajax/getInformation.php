<?
    include "../dbConnect.php";

    //$id = $_POST['id'];
    $id = 3;

    $query = "SELECT * from entertainment WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    $title = rawurlencode(stripslashes($result['name']));

    $url = "http://api.tvmaze.com/search/shows?q=$title";
    //$url = "http://api.tvmaze.com/shows?q=Arrow";
    //$url2 = "http://api.tvmaze.com/search/shows?q=The%20Flash";
    //$url = "http://api.tvmaze.com/search/shows?q=Arrow";

    //echo $url;
    //echo "<br />";
    //echo $url2;

    $json = file_get_contents($url);
  	$data = json_decode($json, TRUE);

    //echo count($data);
    //echo "<br />";
    //print_r($data);

  	for ($x = 0; $x < count($data); $x++) {

    }
?>

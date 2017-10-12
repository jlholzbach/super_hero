<?
    include "../dbConnect.php";

    $id = $_POST['id'];

    $query = "SELECT * from entertainment WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    $title = rawurlencode(stripslashes($result['name']));
    $start = $result['start'];

    $info = "";

    if ($result['movie'] == false) {
      $url = "http://api.tvmaze.com/search/shows?q=$title";
      $json = file_get_contents($url);
    	$data = json_decode($json, TRUE);

    	for ($x = 0; $x < count($data); $x++) {
          $premiered =  date("Y", strtotime($data[$x]['show']['premiered']));
          $data[$x]['show']['premiered'] = date("M. d, Y", strtotime($data[$x]['show']['premiered']));

          if ($premiered == $start) {
            $info = $data[$x];
            break;
          }
      }
    }

    else {

    }


    echo json_encode($info);
?>

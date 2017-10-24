<?php
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
			$info['movie'] = false;
			break;
		  }
		}
  }

	else {
		$url = "https://api.themoviedb.org/3/search/movie?api_key=0dc27c28fd9861490258f2d1b59ae383&query=$title";
		$json = file_get_contents($url);
		$data = json_decode($json, TRUE);

		for ($x = 0; $x < count($data['results']); $x++) {
		  $premiered =  date("Y", strtotime($data['results'][$x]['release_date']));
		  $data['results'][$x]['release_date'] = date("M. d, Y", strtotime($data['results'][$x]['release_date']));

		  if ($premiered == $start) {
			$info = $data['results'][$x];
			$info['movie'] = true;
			break;
		  }
		}
	}

    echo json_encode($info);
?>

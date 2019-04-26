<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'root', '' , 'app_tkd');

	$sql = $conn->prepare("SELECT * FROM alumnos WHERE nombre LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$rgi = $row['rgi'];
			$countryResult[] = $row["nombre"];
			//$countryResult['rgi'] = $rgi;
		}
		echo json_encode($countryResult,$rgi);
	}
	$conn->close();
?>


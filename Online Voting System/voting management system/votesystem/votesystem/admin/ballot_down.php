<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$sql = "SELECT * FROM positions";
		$pquery = $conn->query($sql);

		$output = array('error'=>false);

		$sql = "SELECT * FROM positions WHERE id='$id'";	
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;

		if($priority > $pquery->num_rows){
			$output['error'] = true;
			$output['message'] = 'This position is already at the bottom';
		}
		else{
			$sql = "UPDATE positions SET priority = priority - 1 WHERE priority = '$priority'";
			$conn->query($sql);

			$sql = "UPDATE positions SET priority = '$priority' WHERE id = '$id'";
			$conn->query($sql);
		}

		echo json_encode($output);

	}
	
?>
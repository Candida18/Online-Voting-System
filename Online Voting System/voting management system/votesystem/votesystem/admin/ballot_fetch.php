<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	$sql = "SELECT * FROM positions";
	$pquery = $conn->query($sql);

	$output = '';
	$candidate = '';

	$sql = "SELECT * FROM positions ORDER BY priority ASC";
	$query = $conn->query($sql);
	$num = 1;
	while($row = $query->fetch_assoc()){
		$input = ($row['max_vote'] > 1) ? '<input type="checkbox" class="flat-red '.slugify($row['description']).'" name="'.slugify($row['description'])."[]".'">' : '<input type="radio" class="flat-red '.slugify($row['description']).'" name="'.slugify($row['description']).'">';

		$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
		$cquery = $conn->query($sql);
		while($crow = $cquery->fetch_assoc()){
			$image = (!empty($crow['photo'])) ? '../images/'.$crow['photo'] : '../images/profile.jpg';
			$candidate .= '
				<li>
					'.$input.'<button class="btn btn-primary btn-sm btn-curve clist" style="background-color: #4682B4 ;color:black ; font-size: 12px; font-family:Times"><i class="fa fa-search"></i> Platform</button><img src="'.$image.'" height="100px" width="100px" class="clist"><span class="cname clist">'.$crow['firstname'].' '.$crow['lastname'].'</span>
				</li>
			';
		}

		$instruct = ($row['max_vote'] > 1) ? 'You may select up to '.$row['max_vote'].' candidates' : 'Select only one candidate';
		
		$updisable = ($row['priority'] == 1) ? 'disabled' : '';
		$downdisable = ($row['priority'] == $pquery->num_rows) ? 'disabled' : '';

		$output .= '
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-solid"style="background-color: #d8d1bd" id="'.$row['id'].'">
						<div class="box-header with-border" style="background-color: #d8d1bd">
							<h3 class="box-title"><b>'.$row['description'].'</b></h3>
							<div class="pull-right box-tools">
				                <button type="button" class="btn btn-default btn-sm moveup" data-id="'.$row['id'].'" '.$updisable.'><i class="fa fa-arrow-up"></i> </button>
				                <button type="button" class="btn btn-default btn-sm movedown" data-id="'.$row['id'].'" '.$downdisable.'><i class="fa fa-arrow-down"></i></button>
				            </div>
						</div>
						<div class="box-body">
							<p>'.$instruct.'
								<span class="pull-right">
									<button type="button" class="btn btn-success btn-sm btn-curve reset" style="background-color:#9CD095 ;color:black ; font-size: 12px; font-family:Times"  data-desc="'.slugify($row['description']).'"><i class="fa fa-refresh"></i> Reset</button>
								</span>
							</p>
							<div id="candidate_list">
								<ul>
									'.$candidate.'
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		';

		$sql = "UPDATE positions SET priority = '$num' WHERE id = '".$row['id']."'";
		$conn->query($sql);

		$num++;
		$candidate = '';
	}

	echo json_encode($output);

?>
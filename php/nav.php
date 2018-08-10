<?php
	include 'mysqli.php';
	$sql='SELECT * FROM nav';
	$result=mysqli_query($con, $sql);
	$res=array(
		'code' => 200,
		'message' => '查询完成',
		'data' => ''
	);
	$data = array();
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
	       $data[]=array(
			'id' => $row['id'],
			'name' => $row['name']
			);
	    };
		$res['data']=$data;
		echo json_encode($res);
	}
?>
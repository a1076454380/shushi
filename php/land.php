<?php
	include 'mysqli.php';
	$uname = isset($_POST["uname"]) ?$_POST["uname"]: '';
	$upwd = isset($_POST["upwd"]) ?$_POST["upwd"]: '';
	// 选择数据库
	mysqli_select_db($con,"onecms");
//	查询用户表
	$sql = "SELECT * FROM user";
	$result = mysqli_query($con, $sql);
	$res=array(
		'code' => 300,
		'message' => '用户不存在',
		'data' => ''
	);
	$data = array(
		'uid' => 100,
		'uname' => 'root',
		'upwd' => 'root'
	);
	if (mysqli_num_rows($result) > 0) {
	    // 输出数据
	    while($row = mysqli_fetch_assoc($result)) {
	        if($row['uname']==$uname){
	        	$res['message']='密码错误';
				if($row['upwd']==$upwd){
					$res['message']='登陆成功';
					$res['code']=200;
					$data['uid']=$row['id'];
					$data['uname']=$row['uname'];
					$data['upwd']=$row['upwd'];
					$data['username']=$row['username'];
					$res['data']=$data;
					echo json_encode($res);
				}else{
					$res['message']='密码错误';
					$res['code']=300;
					echo json_encode($res);
				}
	        }
	    };
		if($res['message']=='用户不存在'){
			 echo json_encode($res);
		}
	} else {
	    echo json_encode($res);
	}
	
	mysqli_close($con);
?>
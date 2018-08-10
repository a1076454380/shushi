<?php
include 'mysqli.php';
$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
$upwd = isset($_POST['upwd']) ? $_POST['upwd'] : '';
// 选择数据库
mysqli_select_db($con, "onecms");
$sql = 'SELECT * FROM user';
$res = array('code' => 300, 'message' => '用户不存在', 'data' => '');
$result = mysqli_query($con, $sql);
$boo = false;
while ($row = mysqli_fetch_assoc($result)) {
	if ($row['uname'] == $uname) {
		$res['code'] = 200;
		$res['message'] = '修改完成';
		$boo = true;
	}
};
if ($boo == true) {
	$result = mysqli_query($con, $sql);
	$sql = "UPDATE user SET upwd=$upwd WHERE uname=$uname";
	$result = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con)) {
		echo json_encode($res);
	} else {
		$res['code'] = 300;
		$res['message'] = '修改失败';
		echo json_encode($res);
	}
} else {
	echo json_encode($res);
}
?>
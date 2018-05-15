<?php
ob_start();
session_start();

var_dump($_SESSION);
if (isset($_SESSION['input'])){
	$input_data = $_SESSION['input'];
	unset($_SESSION['input']);
}
//erroeデータを取得
$error = [];
if (isset($_SESSION['error'])){
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}
//var_dump($input_data, $error);

function h($s){
	return htmlspecialchars($s, ENT_QUOTES);
}

?>
<h1>お問い合わせフォーム</h1>
<?php
if(true === isset($error['address_empty'])){
	echo '連絡先は未入力です<br>';
}

if(true === isset($error['body_empty'])){
	echo 'お問い合わせ内容は未入力です<br>';
}

?>
<form action="./input.php" method="post">
お名前:<input name="name" value="<?php echo h(@$input_data['name']); ?>"><br>
連絡先(email):<input name="address"
	value="<?php echo h(@$input_data['address']); ?>"><br>
お問い合わせ内容
<textarea name="body"><?php echo h(@$input_data['body']); ?></textarea><br>
<button type="submit">お問い合わせ</button>
</form>
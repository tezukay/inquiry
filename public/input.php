<?php
ob_start();
session_start();

//入力値の取得
/* いろいろな｢入力値の取得方法｣`
   $name =  (string)@$POST['name'];
   $name = @$_POST['name'] ?? '';	//PHP7以降
   $name = (string)filter_input(INPUT_POST, 'name');
   if (true === isset($_POST['name'])) {
	$name = $POST['name'];
   } else{
	$name = '';
   }
*/
/* $name = @$_POST['name'] ?? '';
   $address = @$_POST['name'] ?? '';
   $body = @$_POST['name'] ?? '';
*/

$params = ['name', 'address', 'body'];
$input_data = [];
foreach($params as $p){
	$input_data[$p] = $_POST[$p] ?? '';
}
//var_dump($input_data);

//validata
$error_flg = [];
//address と bodyは必須入力
if ('' === $input_data['address']){
	//エラー
	$error_flg['address_empty'] = 1;
}
if ('' === $input_data['body']){
	//エラー
	$error_flg['body_empty'] = 1;
}
if([] !== $error_flg){
	$_SESSION['input'] = $input_data;
	$_SESSION['error'] = $error_flg;
	
	//エラーが発生してる
	header('Location: ./form.php');
	exit;
}
//DBへのINSERT


exit;
header('Location: fin.html');

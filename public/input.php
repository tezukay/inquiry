<?php
ob_start();
session_start();

//���͒l�̎擾
/* ���낢��Ȣ���͒l�̎擾���@�`
   $name =  (string)@$POST['name'];
   $name = @$_POST['name'] ?? '';	//PHP7�ȍ~
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
//address �� body�͕K�{����
if ('' === $input_data['address']){
	//�G���[
	$error_flg['address_empty'] = 1;
}
if ('' === $input_data['body']){
	//�G���[
	$error_flg['body_empty'] = 1;
}
if([] !== $error_flg){
	$_SESSION['input'] = $input_data;
	$_SESSION['error'] = $error_flg;
	
	//�G���[���������Ă�
	header('Location: ./form.php');
	exit;
}
//DB�ւ�INSERT


exit;
header('Location: fin.html');

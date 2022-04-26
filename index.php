<?php
session_start();
error_reporting(0);
$_SESSION['prevent_repeat'] = rand();
require_once('config.php');

if( !empty($_POST['my-link']) and isset($_SESSION['prevent_repeat']) ){
	$link = $_POST['my-link'];
	$id = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 );
	$txt_path = "txt-db/";
	if(file_exists($txt_path.$id.".txt")){
		while($id) {
			$id = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 );
			if( file_exists($txt_path.$id.".txt") ){
				continue;
			}else{
				break;
			}
		}
	}
	$create_txt_file = file_put_contents($txt_path.$id.".txt", $link);
	if( $create_txt_file ){
		$website = 'https://'.$_SERVER['SERVER_NAME'].'/';
		$short_link = $website.$id;
		$response = $short_link;
	}else{
		$response = 'We have some errors! Please try later.';
	}
	unset($_SESSION['prevent_repeat']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $config['judul']; ?></title>
	<meta name="description" content="<?= $config['judul']; ?>">
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?= $config['logo']; ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/demo/demo.css" rel="stylesheet" />
</head>
<body>
<?php
require_once('theme/'.$config['theme'].'.php');
?>
</body>
</html>
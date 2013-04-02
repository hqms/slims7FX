<?php
// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
    die("can not access this file directly");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head><title><?php echo $page_title; ?></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="webicon.ico" type="image/x-icon" />
 <link href="<?php echo SWB; ?>template/default/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo SWB; ?>template/default/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="webicon.ico" type="image/x-icon" />
<link href="template/core.style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $sysconf['template']['css']; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/updater.js"></script>
<script type="text/javascript" src="js/gui.js"></script>
 <script type="text/javascript" src="<?php echo SWB; ?>template/default/bootstrap/js/bootstrap.js"></script>
 <script type="text/javascript">
	$(function(){

		$('div[rel=tooltip]').tooltip();

	});
</script>
 </head>
<body id="login-page">
<?php echo $main_content; ?>
</body>
</html>

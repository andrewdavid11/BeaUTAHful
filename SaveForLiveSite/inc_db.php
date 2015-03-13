<?php  
	ini_set('session.use_trans_sid', false);
	ini_set('session.use_cookies', true);
	ini_set('session.use_only_cookies', true);
	$https = false;
	if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') $https = true;
	$dirname = rtrim(dirname($_SERVER['PHP_SELF']), '/').'/';
	//session_name('some_name');
	session_set_cookie_params(0, $dirname, $_SERVER['HTTP_HOST'], $https, true);
    session_start(); 
    @mysql_connect("web462.webfaction.com", "andrewdavid", "DATC10toes") or die(mysql_error());
    @mysql_select_db("hikephotos");
    $DBTap = @mysql_connect("web462.webfaction.com", "andrewdavid", "DATC10toes");
    //$displaySession = session_id();
?>

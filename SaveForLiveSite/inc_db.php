 <?php  
    session_start(); 
    @mysql_connect("web462.webfaction.com", "andrewdavid", "DATC10toes") or die(mysql_error());
    @mysql_select_db("hikephotos");
    $DBTap = @mysql_connect("web462.webfaction.com", "andrewdavid", "DATC10toes");
 ?>

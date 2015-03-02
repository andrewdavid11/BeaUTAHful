<?php 

  $WasGallery =  @mysql_query("SELECT * FROM images WHERE location LIKE '%Wasatch%'");
  $GNPGallery = @mysql_query("SELECT * FROM images WHERE location LIKE '%Glacier National Park%'");
  $PacNWGallery = @mysql_query("SELECT * FROM images WHERE keyword LIKE '%Pacific Northwest%'");
  $IdGallery = mysql_query("SELECT * FROM images WHERE location LIKE '%Idaho%'");
  $DesertsGallery = mysql_query("SELECT * FROM images WHERE keyword LIKE '%desert%'");
  $PanoGallery = mysql_query("SELECT * FROM images WHERE keyword LIKE '%panorama%'");
  $PosterGallery = mysql_query("SELECT * FROM posters");
  $NewestGallery = mysql_query("SELECT * FROM images WHERE keyword LIKE '%Newest%'");

?>

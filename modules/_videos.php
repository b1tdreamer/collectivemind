<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divVideos" class="Item">
	<div class="titulo">
		<img src="img/Parrow.png" width="30" height="26" style="position:relative;left:-100px;cursor: pointer;" class="flechas" id="+"/>
	  	<h2 style="display:inline;width:100px;margin:0 auto">Videos</h2>
	  	<img src="img/Narrow.png" width="30" height="26" style="position:relative;right:-100px;cursor: pointer;" class="flechas" id="-"/>
    </div>
    <div id="subItemVideos" >
    	<div id="divRistra">
<?
		//$videosSql="SELECT * FROM videos INNER JOIN usuarios on videos.autor = usuarios.id order by videos.id desc LIMIT 3";
		$videosSql = 'SELECT * FROM videos order by videos.id desc LIMIT 4';
		$video = mysql_query($videosSql);
		//$codigoVideo=mysql_result($video,0,"link");
		while($codigoVideo = mysql_fetch_array($video))
		{
			if($codigoVideo["vimeo"] == 1){
?>
            
            	<!--iframe src="http://player.vimeo.com/video/<?=$codigoVideo["link"]?>?portrait=0" width="370" height="290" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                </iframe-->
<?
			}else{
?>
            <div class="divObject">
				<object width="370" height="290">
				<!--param name="movie" value="http://www.youtube.com/v/<?=$codigoVideo["link"]?>?fs=1&amp;hl=es_ES&amp;rel=0"></param-->
				<param name="allowFullScreen" value="true"></param>
			  	<param name="allowscriptaccess" value="always"></param>
		  		<param name="wmode" value="transparent" />
		  		<embed src="http://www.youtube.com/v/<?=$codigoVideo["link"]?>?fs=1&amp;hl=es_ES&amp;rel=0"
		  		type="application/x-shockwave-flash" allowscriptaccess="always"
		  		allowfullscreen="true" width="370" height="290" wmode="transparent"></embed>
  				</object>
            </div>
<?
			}
		}
?>

<html>


<head>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	

	

</head>



<body>
	
	<?php
	$tags = '';
	
	if(isset($_GET['tri'])){
		
		$_GET['tri']= $tri;
	}
	

	if(isset($_GET['cir'])){
		
		$_GET['cir'] = $circ;
		
		

	}
	
	
	
	if(isset($_GET['tags'])){
		
		$tags = $_GET['tags'];
		
	}
	
	
	
	
	?>
	
<div id="content">
<div id="header">
	
	<h1>Exquisite Flickr</h1> by Patrick Carey | <a href="http://www.immaterial-labour.com">Immaterial Labour</a>
	
</div>
<div id="form">
	<p> Type a list of comma separated words or terms to return a series of images.</p>
	<p> Refresh the page to see the images reconfigure.</p>
	<form action="" method="get">
		
		<input type="text" name="tags" class="field"/>
			
	
		<input type="submit" value="send"  class="button"/>
	
		
	</form>
	
	<p id="tags">Tags: <?php 
	
	
	if(isset($tags)){
	print $tags;
	
	}
	
	?></p>
	
</div>
	
	<div id="mask">
		
	
		<?php
		
			$switch = rand(0,1);
			
			if($switch == 0){
				
				print '<img src="masks/circle.png" /> ';
				
				
				
			}
			else{
				
				
				print '<img src="masks/triangle.png" /> ';
			}
		
		
		
		?>
				
		
				
	</div>

<div id="main">
	
	

<?php

	

	require_once('phpflickr/phpFlickr.php');
	

	
	$flickr = new phpFlickr('0e559575f2340957803cb7d66cd53f6d','a2afafd5b88c988c');

	$flickr->enableCache("fs", "flickrCache");

	$args = array(
		
	
		"tags" =>  $tags ,
		
		"tag_mode" => "any",
		
		"safe_search" => 3 ,
		
		
		"extras" => 'url_l',
		
		"per_page" => 45,
		
		
		
		
		
		
		
		
	);
	
	$images = $flickr->photos_search($args);
	
	
	
	
	
	
	$int = 0;
	
	$top_left = 100;
	
	$left = 300;
	
	$top = 0;	
	
	if($images){
	

		foreach($images['photo'] as $i){
		
		
			
			
			
			
				
				
				
				
				
				
				
				
						if(array_key_exists('url_l',$i)){
					
				
				
						$height_rand = rand(80,100);
				
				
						$top += 80;
				
						$left += 100;
				
						$int ++;
						
						
						
					
						if($int <= 2){
					
							$rand1 = -rand(0,200);
				
			
							print '<div class="image ' . $int . '" style="background:url('. $i['url_l']  .') no-repeat 0 '. $rand1 . ';  height:100px; width:600px;  position:absolute; top:' . $top .'px;"> </div>';
			
						}
			
						elseif(($int <= 5) && ($int >= 2)){
				
							$rand2 = -rand(250,500);
		
			
			
							print '<div class="image ' . $int . '" style="background:url('. $i['url_l']  .') no-repeat 0 '. $rand2 .'  ;  height:200px; width:600px;   position:absolute; top:' . $top .'px;"> </div>';
			
						}
						elseif(($int <= 8) && ($int >= 5)){
				
							$rand3 = -rand(400,600);
				
				
							print '<div class="image ' . $int . '" style="background:url('. $i['url_l']  .') no-repeat 0 ' . $rand3 .'  ;  height:100px; width:600px;   position:absolute; top:' . $top .'px; "> </div>';
				
				
				
							}
				
				}
					
					
				}
					
					
			
			}
				
			
				
			
			
			
		
		
	
	
	
?>


	
	
</div>

</div>


<script>


$(document).ready(function(){
	
	$('#tags').fadeTo(300, 1);
	
	$(document).click(function(){
		
	
		
		
		
	});
	
	var i =0;
	
	
	
	$('div.image').each(function(){
		
		
		/*
		var randTop = parseInt(Math.random()*100);
		
		randTop = randTop;
		
			
		$(this).css("top", "" + randTop+ "px" )
			
			*/
			
			
		
		
		
		
		var rand_fade = Math.random()*1000;

		$(this).fadeTo(rand_fade,.7);
		
		i++;
		
		var i_c = $(this).addClass(i);
		
		
		
		
		console.log(rand_fade);
		
		
		
		
		
		
	})
	
		
		
		
	
		

		
		
		
		

		
	
	
	

})


</script>


</body>






</html>
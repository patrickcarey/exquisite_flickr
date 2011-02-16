<html>


<head>
	
	<script type="text/javascript" src="js/jquery.js"></script>
	

	
	<style>
	
	body{
		
		
		
	}
	
	#main{
		margin: 100px 5%;
		
		
	}
	
	#main div.image{
		
		margin-top:0px;
		display:none;
		float:left;
		
	}
	
	#main div:first-child{
		
		
		
	}
	
	
	
	

	
	</style>
</head>



<body>
	
	

<div id="main">

<?php

	require_once('phpFlickr.php');
	
	
	$flickr = new phpFlickr('0e559575f2340957803cb7d66cd53f6d','a2afafd5b88c988c');



	$args = array(
		
	
		"tags" => "woman,black and white, close up",
		
		"tag_mode" => "all",
		
		"safe_search" => 3 ,
		
		
		
		"extras" => 'url_o',
		
		"per_page" => 45,
		
		
		
		
		
		
		
		
	);
	
	$images = $flickr->photos_search($args);
	
	
	
	
	
	
	$int = 0;
	
	$top_left = 100;
	
	$left = 300;
	
	
	#	var_dump($images);
		
		#print count($images);
		
		
	
	foreach($images as $image){
		
	
			
			foreach($image as $i){
				
				
				
				
				
				$sizes = $flickr->photos_getSizes($i['id']);
				
				
				
				foreach($sizes as $size){
					
					if($size['label'] == 'Original'){
						$rand3 = rand(200,$size['height']);
				
				
						$height_rand = rand(80,100);
				
				
						$top += 80;
				
						$left += 100;
				
						$int ++;
						
						#print $int . '<br>';
					
					
						if($int <= 2){
					
							$rand1 = -rand(0, ($size['height']-($size['height']*.5)));
				
			
			
							print '<div class="image ' . $int . '" style="background:url('. $i['url_o']  .') no-repeat 0 ' . $rand1 . ' ;  height:100px; width:90%;  position:absolute; top:' . $top .'px;"> </div>';
			
						}
			
						elseif(($int <= 5) && ($int >= 2)){
				
							$rand2 = -rand(($size['height']-($size['height']*.5)),$size['height']);
		
			
			
							print '<div class="image ' . $int . '" style="background:url('. $i['url_o']  .') no-repeat 0 ' . $rand2 . '  ;  height:200px; width:90%;   position:absolute; top:' . $top .'px;"> </div>';
			
						}
						elseif(($int <= 7) && ($int >= 5)){
				
							$rand3 = ($rand3 * -1);
				
				
							print '<div class="image ' . $int . '" style="background:url('. $i['url_o']  .') no-repeat 0 ' . $rand3 . '  ;  height:100px; width:90%;   position:absolute; top:' . $top .'px; "> </div>';
				
				
				
							}
				
			
					
					
				}
					
					
				}
				
				
			
				
			}
			
			
		
		
	}
	
	
?>


	
	
</div>



<script>


$(document).ready(function(){
	
	$(document).click(function(){
		
	
		
		
		
	});
	
	var i =0;
	
	
	
	$('div.image').each(function(){
		
		
		/*
		var randTop = parseInt(Math.random()*100);
		
		randTop = randTop;
		
			
		$(this).css("top", "" + randTop+ "px" )
			
			*/
		
	
		
		
		
		
		var rand_fade = Math.random()*1500;

		$(this).fadeTo(rand_fade,.7);
		
		i++;
		
		var i_c = $(this).addClass(i);
		
		
		
		console.log(rand_fade);
		
		
		
		
		
		
	})
	
		
		
		
	
		

		
		
		
		

		
	
	
	

})


</script>


</body>






</html>
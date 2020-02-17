<!DOCTYPE html>
<html>
<head>
<title>Snowing - Home</title>
<meta name="description" content="Best snowing experiance with us"/>
<meta name="keywords" content="best,snowing,experiance,with,us"/>
<meta name="author" content="Darko Vulicevic"/>
<meta name="robots" content="index,follow"/>
<meta charset="UTF-8">
<link href="app/assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="app/assets/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="app/assets/js/jquery.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="app/assets/css/fwslider.css" media="all">
<link rel="stylesheet" href="app/assets/css/styleAutor.css">



         
     
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.php"><img src="app/assets/images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="app/assets/images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
					<?php foreach($data['menu'] as $menu): 
					?>
						<?php if($menu->naziv == "login" || $menu->naziv=="logout"){
							continue;
						} 
						?>	
						<?php if(isset($_SESSION['noviUser'])) :?>
								<?php if($_SESSION['noviUser']->idUloga==1) :?>
									<li><a href="index.php?page=<?=$menu->naziv?>"><?=$menu->naziv?></a></li>
								<?php endif;?>
							<?php if($_SESSION['noviUser']->idUloga!=1) :?>
								<?php if($menu->naziv == "admin"): continue; ?>
									<?php else :?>
										<li><a href="index.php?page=<?=$menu->naziv?>"><?=$menu->naziv?></a></li>
								<?php endif;?>
							<?php endif;?>
						<?php endif;?>
						<?php if(!isset($_SESSION['noviUser'])) :?>
							<?php if($menu->naziv == "admin"): continue; ?>
								<?php else :?>
									<li><a href="index.php?page=<?=$menu->naziv?>"><?=$menu->naziv?></a></li>
							<?php endif;?>
						<?php endif;?>
						
					<?php endforeach;?>	
							
													
								<div class="clear"></div>
						
							</ul>
							
				    </div>							
	    		    <div class="clear"></div>
		
	    	    </div>
	            <div class="header_right">
		
	    		  <!-- start search-->
					<p style="color:#1aff1a;">
					<?php if (isset($_SESSION['noviUser'])){
						echo $_SESSION['noviUser']->ime;
					}
					?>
					</p>
					
				
		
						<!----search-scripts---->
						
						<!----//search-scripts---->
		
								
				    <ul class="icon1 sub-icon1 profile_img">
					<?php foreach($data['menu'] as $menu): 
							
							?>
						    	
                            
					<?php if (isset($_SESSION['noviUser']) &&($menu->naziv=="logout")) : 
					?>
					 
					 <li><a class="active-icon c1" title="<?=$menu->naziv?>" href="index.php?page=<?=$menu->naziv?>"></a>
					<?php endif;?>
					<?php if (!isset($_SESSION['noviUser']) &&($menu->naziv=="login")) :
					?>
					 <li><a class="active-icon c1" title="<?=$menu->naziv?>" href="index.php?page=<?=$menu->naziv?>"></a>
					<?php endif;?>
					<?php endforeach;?>
					 
				
					 
		
					 </li>
				   </ul>
		
				   <div class="clear"></div>
		
	       </div>
	      </div>
		 </div>
	    </div>
	</div>
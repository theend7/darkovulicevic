<?php 
	if(isset($_SESSION['noviUser'])){
	if($_SESSION['noviUser']->idUloga == 1 || $_SESSION['noviUser']->idUloga == 2 ){
		$this->redirect("home");
	}
		else{
			$this->redirect("home");
		}
	}

?>

<div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="col-md-6">
				 <div class="login-page">
					<h4 class="title">New Customers</h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
					<div class="button1">
					   <a href="index.php?page=register"><input type="submit" name="Submit" value="Create an Account"></a>
					 </div>
					 <div class="clear"></div>
				  </div>
				</div>
				<div class="col-md-6">
				 <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
				
						<form action="index.php?page=login" method="POST" name="forma" id="login-form" onSubmit="return proveraLogin();">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Email</label>
						      <input id="email" type="text" name="email" class="inputbox" size="18" autocomplete="off">
							  <p id="errEmail"></p>
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="password" type="password" name="password" class="inputbox" size="18" autocomplete="off">
							  <p id="errPass"></p>
						    </p> <br/>
							<?php if(isset($_GET['trylogin'])) : ?>
							   <?php if($_GET['trylogin'] == 'try') : 
								
								?>
								 <p style="color:red;">Email or password is not correct!</p>
							   <?php endif;?>
							<?php endif;?>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" name="login" class="button" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					
					</div>
			      </div>
				 <div class="clear"></div>
			  </div>
			</div>
		  </div>
	  </div>
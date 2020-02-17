<?php if($_GET['page'] == "update"):
 ?>
 <form action="index.php?page=update" method="POST" name="forma" id="login-form">
						  <fieldset class="input">
                          <p id="login-form-username">
						      <input  type="hidden"   value="<?=$data['destinations']->idProizvoda?>" name="id" class="inputbox"/>
						    </p>
						    <p id="login-form-username">
						      <label>Picture</label>
						      <input  type="text" value="<?=$data['destinations']->slika?>" name="picture" class="inputbox"/>
						    </p>
						    <p id="login-form-password">
						      <label>Alt</label>
						      <input  type="text" value="<?=$data['destinations']->alt?>" name="alt" class="inputbox"/>
                            </p>
                            <p id="login-form-password">
						      <label>Name</label>
						      <input  type="text" value="<?=$data['destinations']->naziv?>" name="name" class="inputbox"/>
                            </p>
                            <p id="login-form-password">
						      <label>Price</label>
						      <input  type="text" value="<?=$data['destinations']->cena?>" name="price" class="inputbox"/>
						    </p> <br/>
                                <input type="submit" name="update" class="button" value="Update"><div class="clear"></div><br/>
                                <a href="index.php?page=admin"  name="back" class="btn btn-primary black">Back to admin page</a>
						  </fieldset>
						 </form>
 <?php endif;?>
 <?php if($_GET['page'] == "userUpdate"):
 ?>
 <form action="index.php?page=userUpdate" method="POST" name="forma" id="login-form">
 
						  <fieldset class="input">
                          <p id="login-form-username">
							  
						      <input  type="hidden"   value="<?=$data['korisnik']->idKorisnik?>" readonly="readonly" name="id" class="inputbox"/>
						    </p>
						    <p id="login-form-username">
						      <label>Name</label>
						      <input  type="text" value="<?=$data['korisnik']->ime?>" name="name" class="inputbox"/>
						    </p>
						    <p id="login-form-password">
						      <label>Last Name</label>
						      <input  type="text" value="<?=$data['korisnik']->prezime?>" name="lastName" class="inputbox"/>
                            </p>
                            <p id="login-form-password">
						      <label>Email</label>
						      <input  type="text" value="<?=$data['korisnik']->email?>" name="email" class="inputbox"/>
                            </p>
                            <p id="login-form-password">
						      <label>Username</label>
						      <input  type="text" value="<?=$data['korisnik']->username?>" name="username" class="inputbox"/>
						    </p> <br/>
							<p id="login-form-password">
						      <label>idUloga</label>
						      <input  type="text" value="<?=$data['korisnik']->idUloga?>" name="idUloga" class="inputbox"/>
						    </p> <br/>
                                <input type="submit" name="update" class="button" value="Update"><div class="clear"></div><br/>
                                <a href="index.php?page=admin"  name="back" class="btn btn-primary black">Back to admin page</a>
						  </fieldset>
						 </form>
 <?php endif;?>
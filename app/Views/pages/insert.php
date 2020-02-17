<form action="index.php?page=insert" method="POST" name="forma" id="login-form" enctype="multipart/form-data">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label>Picture</label>
						      <input type="file" name="picture" class="inputbox"/>
						    </p>
						    <p id="login-form-password">
						      <label >Alt</label>
						      <input  type="text" name="alt" class="inputbox"/>
                            </p>
                            <p id="login-form-password">
						      <label >Name</label>
						      <input  type="text" name="name" class="inputbox"/>
                            </p>
                            <p id="login-form-password">
						      <label >Price</label>
						      <input  type="text" name="price" class="inputbox"/>
						    </p>
						    <br/>
								<input type="submit" name="insert" class="button" value="Insert"><div class="clear"></div><br/>
								<a href="index.php?page=admin"  name="back" class="btn btn-primary black">Back to admin page</a><div class="clear"></div>
						  </fieldset>
						 </form>
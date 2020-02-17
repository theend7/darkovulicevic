<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    News<small id="fellFree">Latest news, deals</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <?php if(isset($_SESSION['noviUser'])) : ?>
    <?php if($_SESSION['noviUser']->idUloga==1) :
        ?>
        <div class="col-md-12">
            <div class="well well-sm">
                <form action="index.php?page=news" method="POST" onSubmit="return proveraVesti();">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" />
                            <p id="errName"></p>
                        </div>
                        <div class="form-group">
                            <label for="lastName">
                                Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name"/>
                            <p id="errLastName"></p>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"  />
                            <p id="errEmail"></p>
                        </div>
                       
                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Enter news</label>
                            <textarea name="message" id="message" class="form-control"   rows="9" cols="25" 
                                placeholder="Enter here news"></textarea>
                        </div>
                    </div>
                    
                  
                    <div class="col-md-12">
                        <input type="submit" name="ubaciVest" class="btn btn-primary pull-right" id="btnContactUs">
                            </input>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php endif;?>
        <?php endif;?>
        <div class="col-md-4">
        
            <section class="blog-cat mt-5 pb-5">
            
            <?php foreach($data['news']  as $news) : 
         ?>
         <div class="fullbar-item w-100 cursor-pointer" onclick="location.href='#'">
    <div class="container">
        <div class="row py-3 py-md-5 align-items-center border-top">
            <div class="col-md-10 vestiMargin">
                <h3 class="feed-item-heading m-0 font-weight-800">
                <?php if(isset($_SESSION['noviUser'])) : ?>
                <?php if($_SESSION['noviUser']->idUloga==1) :
                ?>
                <a href="index.php?page=deleteNews&idNews=<?=$news->idVesti?>" class="dugmeDeleteStil" href="#">Remove</a>
                <?php endif;?>
                <?php endif;?>
                    <a href="#" class="text-black" href="#"><?=$news->vestKorisnika?></a>
                </h3>
            </div>
            <div class="col-md-2">
                <p class="m-0 text-pink text-uppercase"><?=$news->datum?></p>
            </div>
        </div>
    </div>
</div>
         
            <?php endforeach;?>

</section>
        </div>
    </div>
</div>
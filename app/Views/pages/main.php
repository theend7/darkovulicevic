<div class="banner">
	<!-- start slider -->
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
               <img src="app/assets/images/slider1.jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h1 class="title">Run Over<br>Everything</h1>
                        <!-- /Text title -->
                        <div class="button"><a href="#">See Details</a></div>
                    </div>
                </div>
               <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
               <img src="app/assets/images/slider2.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Run Over<br>Everything</h1>
                       	<div class="button"><a href="#">See Details</a></div>
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
       <!--/slider -->
      </div>
    
  <div class="features">
      <div class="container">
         <h3 class="m_3">Features</h3>
            <div class="close_but"><i class="close1"> </i>
            </div>
            <div class="row">
            <?php foreach($data['features'] as $feat): ?>
            <div class="col-md-3 top_box">
				  <div class="view view-ninth"><a href="#">
                    <img src="<?=$feat->slika?>" class="img-responsive" alt="<?=$feat->alt?>"/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                     
                      </div>
                   </a> 
                   </div>
                   <h4 class="m_4"><a href="#"><?=$feat->naslov?></a></h4>
                  <p class="m_5"><?=$feat->opis?></p>
                  </div>
            <?php endforeach;?>

                </div>
                  
            </div>
        </div>
  </div>
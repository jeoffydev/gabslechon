
 <!-- Hero Start -->
 

        <div class="hero" id="home" style="background: url( <% if $Photo.Link  %>  $Photo.Link  <% else %>     public/images/banner.jpg  <% end_if %> ) no-repeat center center fixed;  -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-7">
                        <div class="hero-content">
                            <div class="hero-text">
                                
                                <% if $CallToAction %><h1><span> $CallToAction </span></h1><% end_if %>	
                                <% if $TagLine2 %><p><span> $TagLine2 </span></p><% end_if %>	
                                <h2></h2>
                                
                            </div>
                            <div class="hero-btn">
                                <% if $PhoneNumber %><a class="btn" href=""> $PhoneNumber </a> <% end_if %>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 d-none d-md-block">
                        <div class="hero-image" >
                            <img src="public/images/chili.png" alt="Hero Image">
                        </div>
                    </div>
                </div>
            </div>
            <% if $Fire == 1 %>
                <div class="flameContainer"> 
                    <span class="flame"></span>
                    <span class="flame flame2"></span>
                    <span class="flame3"></span>
                    <span class="flame flame3"></span>
                    <span class="flame"></span>
                    <span class="flame flame2"></span>
                    <span class="flame"></span>
                    <span class="flame flame2"></span>
                    <span class="flame3"></span>
                    <span class="flame flame3"></span> 
                </div> 
            <% end_if %>	
        </div>
<!-- Hero End -->



        <!-- About Start -->
        <div class="about wow fadeInUp" data-wow-delay="0.1s" id="products"> 
            <div class="container-fluid">

            	<% loop $GetAllProducts %>
                    <div class="row align-items-center">
                        <% if $LeftOrder == 1 %>
                            <div class="col-lg-6">
                                <div class="about-img"> 
                                    <img src="$PrimaryPhoto.URL" class="img-responsive" />
                                </div>
                            </div>
                        <% end_if %>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-header text-left">
                                        <h4 class="text-danger">Price: ${$Price}</h4>
                                        <h2>$Title</h2> $Inc
                                </div>
                                <div class="about-text">
                                    $Description.RAW  
                                </div>
                                 
                               


                                    <form
                                        id="app"
                                        @submit="addToCartSum" 
                                        
                                        >   
                                            <input
                                                class="form-control form-control-lg"  
                                                value="{$ID}"
                                                type="hidden" 
                                                name="idNumber{$ID}"
                                            >
                                             <label for=""> Quantity </label>   
                                             <input
                                                class="form-control form-control-lg limit-input"   
                                                type="number"
                                                name="counterNumber{$ID}"
                                                min="1"
                                                 value="{$Counter}"
                                            >
                                           
                                          
                                        </p>
 
                                        <p>
                                            <input
                                            class="btn" 
                                            type="submit"
                                            value="Add to cart"
                                            >
                                        </p>

                                    </form>  

                                
                            </div>
                        </div>
                        <% if $LeftOrder == 0 %>
                            <div class="col-lg-6">
                                <div class="about-img">
                                    $PrimaryPhoto.Fit(680,680)
                                </div>
                            </div>
                        <% end_if %>

                    </div>
                <% end_loop %>    
            </div>
        </div>
        <!-- About End -->
        



        
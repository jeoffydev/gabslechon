
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
        <div class="about wow fadeInUp" data-wow-delay="0.1s" id="about">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/about.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header text-left">
                                <p>Learn About Me</p>
                                <h2>10 Years Experience</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida
                                </p>
                            </div>
                            <div class="skills">
                                <div class="skill-name">
                                    <p>Web Design</p><p>85%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="skill-name">
                                    <p>Web Development</p><p>95%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="skill-name">
                                    <p>Apps Design</p><p>90%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="skill-name">
                                    <p>Apps Development</p><p>85%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
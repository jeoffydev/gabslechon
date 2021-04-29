 



   <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                         
                        
                        <div class="footer-menu">
                             $FooterContent
                        </div>
                        <div class="footer-social">


							<% with $SiteConfig %>
								<% if $FacebookLink %>
								<li><a href="$FacebookLink"><i class="fab fa-facebook-f"></i></a></li>
								<% end_if %>
								<% if $TwitterLink %>
								<li><a href="$TwitterLink"><i class="fab fa-twitter"></i></a></li>
								<% end_if %> 
								<% if $YouTubeLink %>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>    
								<% end_if %>
							<% end_with %>      
                        </div>
                    </div>
                </div>
                <div class="container copyright">
                    <p>&copy; <a href="/"> <% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title </a>, All Right Reserved $Now.format(Y)</p>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        
        <!-- Back to top button -->
        <a href="#" class="btn back-to-top"> &#8593; </a>
        
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>
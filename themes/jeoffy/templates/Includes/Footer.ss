 



   <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                         
                        
                        <div class="footer-menu text-white">
                            <% with $SiteConfig %> $FooterContent 	<% end_with %>      
                        </div>
                        <div class="footer-social"> 
							<% with $SiteConfig %>
								<% if $FacebookLink %>
								     <a href="$FacebookLink" target="_blank"><img src="$BaseHref/public/images/fb.png" style="width:40px; height:40px"></a> 
								<% end_if %>
							 
								<% if $YouTubeLink %>
								     <a href="$YouTubeLink" target="_blank"><img src="$BaseHref/public/images/youtube.png" style="width:40px; height:40px"></a>    
								<% end_if %>
							<% end_with %>      
                        </div>
                    </div>
                </div>
                <div class="container copyright">
                    <p>&copy; <a href="$BaseHref"> <% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</a>, All Right Reserved $Now.format(Y)</p>
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
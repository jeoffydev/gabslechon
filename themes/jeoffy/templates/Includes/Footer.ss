<footer class="footer" role="contentinfo">
	 <div class="container-fluid">
	 	<div class="row">
		 	<div class="col-md-12 text-center"> Footer soon... </div>
			 <ul class="social-networks">
				<% with $SiteConfig %>
					<% if $FacebookLink %>
					<li><a href="$FacebookLink">Facebook</a></li>
					<% end_if %>
					<% if $TwitterLink %>
					<li><a href="$TwitterLink">Twitter</a></li>
					<% end_if %>
					<% if $GoogleLink %>
					<li><a href="$GoogleLink">Google</a></li>
					<% end_if %>
					<% if $YouTubeLink %>
					<li><a href="#">Youtube</a></li>    
					<% end_if %>
				<% end_with %>                                
				</ul>
		 </div>
	 </div>
</footer>

					
<!-- Hero Start -->
<div class="hero2 $Title" id="home">
             <div class="container">

				<div class="row whitebg padding-row">
					<div class="col-md-12">  
					<h3>Cart </h3>

						<form action="/web/client/gabbys/gabbys-lechon/cart/submitForm" method="GET">
							<% loop $getAllCookies.items %>
								<div class="row  ">
									<div class="col-md-2">  
										<img src="$PrimaryPhoto.URL" class="img-thumbnail" />
									</div>
									<div class="col-md-10"> 
										<h3>  <span class="badge badge-secondary">Price: $$Price </span> </h3>
										<h3> $Title  </h3> 
										$Description.RAW  
										<br />
										<input type="number" class="form-control form-control-lg" id="{$ID}counter" name="counter{$ID}" value="$Counter" min="1"> 
									</div>
								</div>	

								
							<% end_loop %>

							<div class="row ">
										<div class="col-md-12">   
												<p><input type="submit" class="btn btn-primary"  value="Update Cart">	</p> 
										</div> 
								</div>	
							
							<% if $getAllCookies.total %>
								<div class="row ">
										<div class="col-md-12">  
											<div class="alert alert-secondary" role="alert">
												<p>$getAllCookies.summary </p>
												<hr />
												<h3>  <span class="badge badge-success"> Total: $getAllCookies.total </span> </h3>
											</div> 
										</div> 
								</div>	
							<% end_if %>
							
						</form>	

					</div> 
				</div>	


			</div>	
           
</div>
        <!-- Hero End -->
					
					
				 


 
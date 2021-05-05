 

 
					
<!-- Hero Start -->
<% if $getCookies.items %>
<div class="hero2 $Title" id="home">
             <div class="container"> 
				<div class="row whitebg">
					<div class="col-md-8">  
                        <div class=" padding">
                            <h3>Checkout </h3> 
                            $checkoutForm
                         </div>

					</div>
                    <div class="col-md-4">

                        <div class=" padding">
                            <% loop $getCookies.items %>
								<div class="row  ">
									<div class="col-md-4">  
										<img src="$PrimaryPhoto.URL" class="img-thumbnail" />
									</div>
									<div class="col-md-8"> 
										<h3>  <span class="badge badge-secondary">Price: ${$Price} </span> </h3>
										<h3> $Title  </h3> 
                                        <p>Quantity: $Counter</p>
										 
									</div>
								</div>	 
							<% end_loop %>

                            
							<% if $getCookies.total %>
								<div class="row ">
										<div class="col-md-12">  
											<div class="alert alert-secondary" role="alert">
												<p>$getCookies.summary </p>
												<hr />
												<h3>  <span class="badge badge-success"> Total: ${$getCookies.total} </span> </h3>
											</div> 
										</div> 
								</div>	
							<% end_if %>
                        </div>
    
                    </div>
				</div>	 
			</div>	
           
</div>
<!-- Hero End -->
<% else %>

<div class="hero2 $Title" id="home">
    <div class="container"> 
		<div class="row whitebg">
			<div class="col-md-12">  
				<p> No Cart added </p>
			</div>	
		</div>	 
	</div>   
</div>				

<% end_if %>
					
				 


 
					
<!-- Hero Start -->
<% if $getAllCookies.items %>
<div class="hero2 $Title" id="home">
             <div class="container">

				<div class="row whitebg padding-row">
					<div class="col-md-7">  
						<h3>Cart </h3>

						<form action="/web/client/gabbys/gabbys-lechon/cart/submitForm" method="GET">
							<% loop $getAllCookies.items %>
								<div class="row  cart-border">
									
									<div class="col-md-4">  
										<img src="$PrimaryPhoto.URL" class="img-thumbnail" />
									</div>
									<div class="col-md-8"> 
										<span class="removeCart text-red" v-on:click="removerCart({$ID})"> X </span>
										<h3>  <span class="badge badge-secondary">Price: ${$Price} </span> </h3>
										<h3> $Title  </h3> 
										<p>$Teaser </p>
										 
										 <label for=""> Quantity </label> 
										<input type="number" class="form-control form-control-lg limit-input" id="{$ID}counter" name="counter{$ID}" value="$Counter" min="1"> 
									</div>
								</div>	

								
							<% end_loop %>

							<% if $getAllCookies.total %>
								<div class="row ">
										<div class="col-md-12">  
											<div class="alert alert-secondary"   role="alert">
												<p>$getAllCookies.summary </p>
												<hr />
												<h3>  <span class="badge badge-success"> Total: ${$getAllCookies.total} </span> </h3>
											</div> 
										</div> 
								</div>	
							<% end_if %>


							<div class="row ">
										<div class="col-md-4">   
												<p><input type="submit" class="btn btn-primary"  value="Update Cart">	</p> 
										</div> 
										<div class="col-md-3">   
												<p><a class="btn btn-primary text-white" href="/web/client/gabbys/gabbys-lechon/checkout" >Check Out </a>	</p> 
										</div> 
							</div>	

						</form>	

						 
							
						
							
						

					</div> 
					<div class="col-md-5"> 

							<h4 class="margin-left"> Frequently Asked Questions</h4>
							<div id="accordion">
								<div class="card">
									<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											FAQ 1
										</button>
									</h5>
									</div> 
									<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
										<div class="card-body">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											FAQ 2
										</button>
									</h5>
									</div>
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
										<div class="card-body">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
										</div>
									</div>
								</div>
								 
							</div>


					</div>
				</div>	


			</div>	
           
</div>
<!-- Hero End -->
					
<% else %>

<div class="hero2 $Title" id="home">
    <div class="container"> 
		<div class="row  ">
			 
				<div class="col-md-12 margin-top-cart alert alert-warning text-center">
					<p> No Cart added </p>
				</div>
			 
		</div>	 
	</div>   
</div>				

<% end_if %>					




 
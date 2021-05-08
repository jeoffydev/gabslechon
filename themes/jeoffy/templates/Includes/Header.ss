 <!-- Nav Bar Start -->
        <div class="navbar main-header navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="$BaseHref" class="navbar-brand"> <img src="public/images/logo.png" alt="Gabby's Lechon" class="logo"></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                     
                            <% if  $Title == 'Cart' ||  $Title == 'Checkout'    %> 

                                <div class="navbar-nav ml-auto">
                                   <% loop $Menu(1) %> 
                                        <% if $MenuTitle == Home %>
                                            <a href="$Link" class="nav-item nav-link $LinkingMode">$MenuTitle.XML</a>  
                                        <% end_if %>  

                                    <% end_loop %>
                                </div>   

                            <% else %> 
                                    <div class="navbar-nav ml-auto">
                                        <% if InSection(blog) ||  InSection(success) %> 
                                            <a href="$BaseHref" class="nav-item nav-link $LinkingMode">Home</a>  
                                        <% else %> 

                                            
                                                <a href="#home" class="nav-item nav-link active">Home</a>
                                                <a href="#products" class="nav-item nav-link">Products</a> 
                                                <a href="#blog" class="nav-item nav-link">Blog</a>
                                                <span  class="nav-item nav-link text-danger"> <span class="badge badge-secondary">  {{totalCartValue}} </span> 
                                                     <a href="{$BaseHref}Cart" v-if="totalCartValue > 0"> My Cart </a> 
                                                     <span   v-if="totalCartValue == 0"> My Cart </span> 
                                                </span>
                                            
                                    <% end_if %>  
                                 </div>     

                            <% end_if %> 

                        
                  
                </div>
            </div>
        </div>
<!-- Nav Bar End -->
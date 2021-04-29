<?php

namespace SilverStripe\Lechon; 


use PageController;
use SilverStripe\View\Requirements;

use SilverStripe\Control\HTTPRequest;

class ProducttypePageController extends PageController
{
     
    private static $allowed_actions = [
         
        'GetAllProducts'
       
    ]; 

    public function GetAllProducts() 
    { 
        return Producttype::get()
                 ->sort('Created', 'DESC');
    }    
}
 

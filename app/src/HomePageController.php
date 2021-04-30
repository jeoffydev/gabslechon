<?php

namespace SilverStripe\Lechon; 

use PageController;

use SilverStripe\Control\Cookie;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\SSViewer;

class HomePageController extends PageController
{
    private static $allowed_actions = [
         
        'GetAllProducts', 
       
    ]; 

     

    public function GetAllProducts() 
    { 
        return Producttype::get()
                 ->sort('Created', 'DESC');
    }    

    protected function init()
    {
        parent::init();
        SSViewer::setRewriteHashLinksDefault(false);
    }

}
 

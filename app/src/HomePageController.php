<?php

namespace SilverStripe\Lechon; 

use PageController;

use SilverStripe\Control\Cookie;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\SSViewer;
use SilverStripe\Control\Controller;
use SilverStripe\View\ArrayData;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Control\Session;

class HomePageController extends PageController
{
    private static $allowed_actions = [
         
        'GetAllProducts', 
       
    ]; 

    public function getCookies(){
        $getCookies = new MycartPageController();
        return $getCookies;
    } 

    public function GetAllProducts() 
    { 
        //$this->clearCartsession();
        $newItems =  new ArrayList(); 
        $arrayValues = Producttype::get()
                 ->sort('Created', 'DESC');
        
        $counterInc = 0;
        foreach($arrayValues as $item) {    
            $arrayNewData = $this->newDataAdded($item); 
            $counterInc+= $arrayNewData->Counter; 
            $newItems->push($arrayNewData);  
        } 

        //Save to session
        //$this->getRequest()->getSession()->set('MySessionItem', $counterInc);
       
        $arrayValues = $newItems;
         

        
        return $arrayValues;
    }    

    public function newDataAdded($item){

        $counter = 1;
        
        $x = 0; 
        foreach($this->getCookies()->getAllCookies()->items as $row){  
            if($row->ID == $item->ID){
                $counter = $row->Counter;   
                $x++; 
            }  
           
        }  

        $arrayNewData = new ArrayData(array(
            'ID' => $item->ID,
            'Title'=> $item->Title,
            'Description'=> $item->Description,
            'PrimaryPhoto' => $item->PrimaryPhoto,
            'LeftOrder' => $item->LeftOrder,
            'Price' =>  $this->getCookies()->currencyFormat($item->Price),
            'Counter' => $counter 
        )); 

        
       

        return $arrayNewData;

    }

    


    protected function init()
    {
        parent::init();
        SSViewer::setRewriteHashLinksDefault(false);
    }

}
 

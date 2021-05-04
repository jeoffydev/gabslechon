<?php

namespace SilverStripe\Lechon; 

use PageController; 

use SilverStripe\Control\Cookie;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\CookieJar;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\NumericField;

use SilverStripe\Control\Session;


class MycartPageController extends PageController
{

    private static $allowed_actions = [
        'getAllCookies', 
        'submitForm',
        'cartApi',
        'test',
        'getCookiesHomepage',
        'getCookiesSum',
        'checkoutForm'
    ];

    public function test(){
        echo "TEST1";
    }

    public function cartApi(HTTPRequest $request){
       
         if($this->getRequest()->params()){
             $id = $request->param('ID'); 
             $id2 = $request->param('OtherID');
             $this->setCookie($id, $id2);
         }
 
         
     }
     
     public function setCookie( $id, $id2 ){ 
         if($id && $id2){
             $value = $id.'_'.$id2;
             $name = 'products_'.$id;
             return Cookie::set( $name, $value, $expiry = 90, $path = null, $domain = null, $secure = false, $httpOnly = false);   
         } 
     }
     
     
    public function CookieForm($value){

        $fields = new FieldList( 
            NumericField::create('Quantity', 'Quantity', $value)->addExtraClass('numberonly')->setMaxLength(3),
        );  
        $actions = new FieldList(
            FormAction::create('doCartSubmit')->setTitle('Update Cart')
        ); 
        $form = new Form($this, 'getAllCookiesSubmit', $fields, $actions, null);  
        return $form;
    }

    public function getAllCookies(){

       
        $arrayCookies = Cookie::get_inst()->getAll();
         
        if(count($arrayCookies) > 0){
            
            $arrayIDs = array(); 
            $arrayValues = array(); 
            foreach($arrayCookies as $key => $value){ 
                $compare =  substr($key, 0, 9); 
                if($compare == "products_"){ 
                    $valueArray = explode('_', $value); 
                    $arrayIDs[] = $valueArray[0];
                    $arrayValues[] =$valueArray[0].'_'.$valueArray[1];
                }
            } 

            $newItems =  new ArrayList();
            $x = 0; 
            $sum = 0;
            $sumComputation = "";

            if(count($arrayIDs) > 0 ){

                $items = Producttype::get()->byIDs($arrayIDs); 
                
                

                $counterInc = 0;
                foreach($items as $item) {   
                        

                        $valExplode = array();
                        foreach($arrayValues as $val){
                                $valExplode[]  = explode('_', $val);  
                        } 
                        $counter = 1;
                        for($y= 0; $y < count($valExplode); $y++){
                            
                            if($valExplode[$y][0] == $item->ID){
                                $counter = $valExplode[$y][1];
                            }
                        } 

                        $sum += $item->Price * $counter;

                       
                        $sumComputation .= $item->Price. " X " .$counter."\n";

                        $counterInc+= $counter; 
                        
                        $arrayData = new ArrayData(array(
                            'ID' => $item->ID,
                            'Title'=> $item->Title,
                            'Description'=> $item->Description,
                            'Teaser'=> $item->Teaser,
                            'PrimaryPhoto' => $item->PrimaryPhoto,
                            'Price' => $this->currencyFormat($item->Price),
                            'Counter' => $counter,
                            'Total'=> $sum,  
                            'QuantityField' => $this->CookieForm($counter) 
                        ));
                
                        $newItems->push($arrayData); 
                        $x++;
                } 
                
                

            }  
            //Create new array
            $output = array ('items' => $newItems, 'total'=> $sum, 'summary'=> $sumComputation );
            return  ArrayData::create($output); 
        }
       
    }


    public function getCookiesHomepage(){

        $arrayCookies = Cookie::get_inst()->getAll();
         
        if(count($arrayCookies) > 0){
            
            $arrayIDs = array();  
            foreach($arrayCookies as $key => $value){ 
                $compare =  substr($key, 0, 9); 
                if($compare == "products_"){ 
                    $valueArray = explode('_', $value); 
                    $arrayIDs[] = $valueArray[0].",".$valueArray[1]; 
                }
            } 

            return  json_encode($arrayIDs);
        }
       
    }


    public function getCookiesSum(){

        $arrayCookies = Cookie::get_inst()->getAll();
         
        if(count($arrayCookies) > 0){
            
            $arrayIDs = 0;  
            foreach($arrayCookies as $key => $value){ 
                $compare =  substr($key, 0, 9); 
                if($compare == "products_"){ 
                    $valueArray = explode('_', $value); 
                    $arrayIDs += $valueArray[1]; 
                }
            }  
            echo  $arrayIDs;
        }
       
    }


    


    public function currencyFormat($money){
         
        return number_format($money, 2, '.', '');
    }


    public function submitForm(HTTPRequest $request)
    {   
        

        if($get = $_GET){
            foreach($get as $key => $value){
               
                $key = substr($key, 7);
                //echo $key. " = " .$value. "/";
                $this->setCookie( $key, $value);
            }
        } 
       
        return $this->redirectBack();
    }


    public function checkoutForm()
    {   
        
        echo "Chuchay";
    }
 


    
    

}
 

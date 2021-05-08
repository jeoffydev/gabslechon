<?php

namespace SilverStripe\Lechon; 

use PageController; 

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Security\Member;

use SilverStripe\Control\Session;
use SilverStripe\Control\Cookie;
use SilverStripe\Control\Email\Email;


//Validatator 
//https://github.com/praxisnetau/silverware-validator#emailrule
//configure using the app.yml settings
use SilverWare\Validator\Validator;
use SilverWare\Validator\Rules\RequiredRule;
use SilverWare\Validator\Rules\EmailRule;


class CheckoutPageController extends PageController
{

    private static $allowed_actions = [ 
        'checkoutForm',
        'getCookies',
        'doContactSubmit',
        'deleteCookie'
    ];

    
    public function getCookies(){
        $getCookies = new MycartPageController();  
        
        return $getCookies->getAllCookies();
    } 

     

    public function checkoutForm()
    {    
        

        $fields = new FieldList(
            DateField::create('EventDate', 'When do you want this order to deliver?')->addExtraClass("form-control"),
            TextField::create('Name', 'Your Name')->addExtraClass("form-control"),
            TextField::create('Phone', 'Phone or Mobile')->addExtraClass("form-control"),
            TextField::create('Email', 'Email Address')->addExtraClass("form-control"),
            TextareaField::create('Comment', 'Your Comment')->addExtraClass("form-control")
        );

        $actions = new FieldList(
            FormAction::create('doContactSubmit')->setTitle('Submit Enquiry Form')->addExtraClass("margin-top btn btn-dark")
        );

           //$required = new RequiredFields('Name'); 
        // Or, through a setter.
        $validator = Validator::create();

        $validator->addRequiredFields([
            'Name',
            'Email' ,
            'Phone' 
        ]);
        $validator->setRule(
            'Email',
            EmailRule::create()
        );

        $form = new Form($this, 'checkoutForm', $fields, $actions, $validator);

        


        return $form;
    }

    public function doContactSubmit($data, Form $form){ 

        //print_r($data);
        $body = "";
        if($this->getCookies()->items){
            foreach($this->getCookies()->items as $row){  
                $body .= "Product Name: " .$row->EventDate. "<br />";   
                $body .= "Product Name: " .$row->Title. "<br />";   
                $body .= "Price: " .$row->Price. "<br />";   
                $body .= "Quantity: " .$row->Counter. "<br />";  
                $body .= "<hr />";  
               
            }   
            $body .= "Total: $".$this->getCookies()->total;
        }  

        $comment = OrderData::create();
        $comment->EventDate = $data['EventDate']; 
        $comment->Name = $data['Name'];
        $comment->Phone = $data['Phone'];
        $comment->Email = $data['Email'];
        $comment->Comment = $data['Comment']; 
        $comment->CheckoutPageID = $this->ID;
        $comment->OrderDetails = $body;
        $comment->write();  
        
        //Remove all cookies
        if($this->getCookies()->items){
            foreach($this->getCookies()->items as $row){   
                $this->deleteCookie($row->ID);
            }    
        }  

        //Email

        $email = new Email(); 
         
        $email->setTo('jeoffy_hipolito@yahoo.com'); 
        $email->setFrom($data['Email']); 
        $email->setSubject("New order from {$data["Name"]}"); 
          
        $email->setBody($body); 
        $email->send(); 


        $form->sessionMessage('Thank you '. $data['Name'].', this will be stored in the database. ', 'success');

        return $this->redirect('success/'); 

    }


    public function deleteCookie($id){ 
        
        if($id ){ 
            $name = 'products_'.$id;
            $value = "";
            return Cookie::set( $name, $value, $expiry = 0, $path = null, $domain = null, $secure = false, $httpOnly = false);   
        } 
    }
 


    
    

}
 

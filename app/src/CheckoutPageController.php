<?php

namespace SilverStripe\Lechon; 

use PageController; 

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Security\Member;

use SilverStripe\Control\Session;


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
        'doContactSubmit'
    ];

    
    public function getCookies(){
        $getCookies = new MycartPageController();  
        
        return $getCookies->getAllCookies();
    } 

     

    public function checkoutForm()
    {    
        

        $fields = new FieldList(
            TextField::create('Name', 'Your Name'),
            TextField::create('Email', 'Email Address'),
            TextareaField::create('Comment', 'Your Comment')
        );

        $actions = new FieldList(
            FormAction::create('doContactSubmit')->setTitle('Submit Enquiry Form')
        );

           //$required = new RequiredFields('Name'); 
        // Or, through a setter.
        $validator = Validator::create();

        $validator->addRequiredFields([
            'Name',
            'Email'  
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
           
                $body .= "Product Name: " .$row->Title. "<br />";   
                $body .= "Price: " .$row->Price. "<br />";   
                $body .= "Quantity: " .$row->Counter. "<br />";  
                $body .= "<hr />";  
               
            }   
            $body .= "Total: $".$this->getCookies()->total;
        }  

        $comment = OrderData::create();
         
        $comment->Name = $data['Name'];
        $comment->Email = $data['Email'];
        $comment->Comment = $data['Comment']; 
        $comment->CheckoutPageID = $this->ID;
        $comment->OrderDetails = $body;
        $comment->write();  
        

        $form->sessionMessage('Thank you '. $data['Name'].', this will be stored in the database. ', 'success');

        return $this->redirect('success/'); 

    }
 


    
    

}
 

<?php

namespace SilverStripe\Lechon; 

use SilverStripe\ORM\DataObject;

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DateField;

class OrderData extends DataObject
{
    private static $table_name = 'OrderData';

    private static $db = [
        
        'Name' => 'Varchar',
        'Email' => 'Varchar',
        'Comment' => 'Text',
        'OrderDetails' => 'HTMLText', 
    ];
 
    private static $summary_fields = [
        'Name' => 'Name',
        'Email' => 'Email',
        'Comment' => 'Comment',
        'OrderDetails.Summary' => 'Order Details',  
      ];

      //Complex
    public function searchableFields()
    {
            return [
                'Name' => [
                    'filter' => 'PartialMatchFilter',
                    'title' => 'Customer Name',
                    'field' => TextField::class,
                ],
                'Email' => [
                    'filter' => 'PartialMatchFilter',
                    'title' => 'Customer Email Address',
                    'field' => TextField::class,
                ] 
                
            ];
            //use 'ProductCode' => NumericField::class if numeric
    }
}


?>


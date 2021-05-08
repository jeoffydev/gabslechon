<?php

namespace SilverStripe\Lechon; 

use SilverStripe\ORM\DataObject;

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DateField;

class FaqData extends DataObject
{
    private static $table_name = 'FaqData';

    private static $db = [
        
        'Question' => 'Varchar',  
        'Answer' => 'HTMLText', 
    ];
 
    private static $summary_fields = [
        'Question' => 'Question',  
        'Answer.Summary' => 'Answer', 
      ];

     
}


?>


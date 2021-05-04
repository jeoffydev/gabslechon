<?php 

namespace SilverStripe\Lechon; 


use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DateField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\ArrayLib;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\DecimalField;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField; 
use SilverStripe\Forms\HTMLText; 
use SilverStripe\Forms\TextareaField;

class Producttype extends DataObject
{

    private static $table_name = 'Producttype'; 

    private static $db = [
        'Title' => 'Varchar',
        'Price' => 'Currency', 
        'Teaser' => 'Text',
        'Description' => 'HTMLText',
        'Perkilo' => 'Boolean',
        'Availability' => 'Boolean',
        'LeftOrder' => 'Boolean', 
        
    ];

    private static $has_one = [ 
        'PrimaryPhoto' => Image::class,
    ];

    private static $owns = [
        'PrimaryPhoto',
    ];

   
   

    private static $summary_fields = [
        'GridThumbnail' => '',
        'Title' => 'Title',
        'Price.Nice' => 'Price', 
        'Teaser' => 'Teaser',
        'Perkilo' => 'Per Kilo',
        'Availability' => 'Available',
        'LeftOrder' => 'Left Order' 
    ];

   
 
    public function getGridThumbnail()
   {
       if($this->PrimaryPhoto()->exists()) {
           return $this->PrimaryPhoto()->ScaleWidth(50);
       }

       return "(no image)";
   }
 
 
    //Complex
    public function searchableFields()
    {
            return [
                'Title' => [
                    'filter' => 'PartialMatchFilter',
                    'title' => 'Title',
                    'field' => TextField::class,
                ],
                'Availability' => [
                    'filter' => 'PartialMatchFilter',
                    'title' => 'Available',
                    'field' => CheckboxField::class,
                ],
                
            ];
            //use 'ProductCode' => NumericField::class if numeric
    }

    

    public function getCMSfields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            TextareaField::create('Teaser', 'Short description'),
            HtmlEditorField::create('Description', 'Full description'),
            CurrencyField::create('Price','Price of this item in NZD'), 
            CheckboxField::create('Availability','Is this available?'),
            CheckboxField::create('LeftOrder','Image is on the left side') 
            
        ]);
        $fields->addFieldToTab('Root.Photos', $upload = UploadField::create(
            'PrimaryPhoto',
            'Primary photo'
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png','jpeg','jpg' 
        ));
        $upload->setFolderName('mainproduct-photos');

        return $fields;
    }
 

    
}


?>
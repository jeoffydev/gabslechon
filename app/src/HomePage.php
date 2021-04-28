<?php

namespace SilverStripe\Lechon; 

use Page;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\SelectField;
use SilverStripe\Forms\CheckboxField;

use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class HomePage extends Page
{

    
    private static $table_name = 'HomePage';


    private static $db = [ 
        'CallToAction' => 'Varchar',
        'TagLine2' => 'Varchar',
        'PhoneNumber' => 'Varchar',
        'Fire' => 'Boolean',
    ];

    private static $has_one = [
        'Photo' => Image::class 
    ];
  
      private static $owns = [
          'Photo',
      ];
  

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
         
        $fields = FieldList::create(
            TextField::create('CallToAction','Call to action'),
            TextField::create('TagLine2','Other tagline'),
            TextField::create('PhoneNumber','Phone number'),
            CheckboxField::create('Fire','Show fire effects'),
            $uploader = UploadField::create('Photo','Home Banner')
        );
       
        $uploader->setFolderName('homebanner-photos');
        $uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);

        return $fields;
    }


}
 

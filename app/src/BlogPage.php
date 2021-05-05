<?php

namespace SilverStripe\Lechon; 

use Page;
use SilverStripe\Forms\DateField; 
use SilverStripe\Forms\CheckboxSetField;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\SelectField;
use SilverStripe\Forms\CheckboxField;

use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class BlogPage extends Page
{

    
    private static $table_name = 'BlogPage';

    private static $can_be_root = false; 

    private static $db = [
        'Date' => 'Date',
        'Teaser' => 'Text',
        'Authors' => 'Varchar',
    ];


    private static $has_one = [
        'PrimaryPhoto' => Image::class 
    ];
  
      private static $owns = [
          'PrimaryPhoto',
      ];
  

    
      public function getCMSFields(){
        $fields = parent::getCMSFields(); 

        $fields->addFieldToTab('Root.Main', DateField::create('Date','Date of article'), 'Content');   
        $fields->addFieldToTab('Root.Main', TextareaField::create('Teaser')->setDescription('This is the summary that appears on the article list page.'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Authors','Author of article'), 'Content');

       
       // $fields->addFieldToTab('Root.Attachments', UploadField::create('Brochure','Travel brochure, optional (PDF only)'));
       $fields->addFieldToTab('Root.Main', $photo = UploadField::create('PrimaryPhoto')); 

       $photo->setFolderName('blog-photos'); 

       return $fields;
    }


}
 

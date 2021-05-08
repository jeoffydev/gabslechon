<?php 
namespace SilverStripe\Lechon; 

use SilverStripe\Admin\ModelAdmin;

class FaqDataAdmin extends ModelAdmin
{

    private static $menu_title = 'FAQ';

    private static $url_segment = 'faqs';

    private static $managed_models = [
        FaqData::class,
    ];

    private static $menu_icon = 'icons/product.png';  

}
?>
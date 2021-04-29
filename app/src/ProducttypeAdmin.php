<?php 
namespace SilverStripe\Lechon; 

use SilverStripe\Admin\ModelAdmin;

class ProducttypeAdmin extends ModelAdmin
{

    private static $menu_title = 'Lechon';

    private static $url_segment = 'lechons';

    private static $managed_models = [
        Producttype::class,
    ];

    private static $menu_icon = 'icons/product.png';  

}
?>
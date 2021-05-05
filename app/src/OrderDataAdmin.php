<?php 
namespace SilverStripe\Lechon; 

use SilverStripe\Admin\ModelAdmin;

class OrderDataAdmin extends ModelAdmin
{

    private static $menu_title = 'Order';

    private static $url_segment = 'orders';

    private static $managed_models = [
        OrderData::class,
    ];

    private static $menu_icon = 'icons/product.png';  

}
?>
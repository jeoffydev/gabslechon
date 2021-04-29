<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
            Requirements::set_write_js_to_body(true);

            Requirements::css('themes/jeoffy/css/bootstrap.min.css');
            Requirements::css('themes/jeoffy/css/fontawesome.min.css'); 
            Requirements::css('themes/jeoffy/jscript/animate/animate.min.css');
            Requirements::css('themes/jeoffy/jscript/owlcarousel/assets/owl.carousel.min.css');
            Requirements::css('themes/jeoffy/jscript/lightbox/css/lightbox.min.css'); 
            Requirements::css('themes/jeoffy/css/style.css');



            Requirements::javascript('themes/jeoffy/javascript/jquery.min.js');
            Requirements::javascript('themes/jeoffy/javascript/bootstrap.min.js'); 
            Requirements::javascript('themes/jeoffy/javascript/easing.min.js');
            Requirements::javascript('themes/jeoffy/javascript/wow.min.js');
            Requirements::javascript('themes/jeoffy/javascript/waypoints.min.js');
            Requirements::javascript('themes/jeoffy/javascript/typed.min.js');
            Requirements::javascript('themes/jeoffy/javascript/owl.carousel.min.js');
            Requirements::javascript('themes/jeoffy/javascript/isotope.pkgd.min.js');
            Requirements::javascript('themes/jeoffy/javascript/lightbox.min.js');  
            Requirements::javascript('themes/jeoffy/javascript/main.js');
            Requirements::javascript('themes/jeoffy/javascript/vue.js');
            Requirements::javascript('themes/jeoffy/javascript/script.js');
        }
    }
}

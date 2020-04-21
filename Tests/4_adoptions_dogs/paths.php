<?php
    define('PROJECT', '/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/');

    //SITE_ROOT
    define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);
    
    //SITE_PATH
    define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

    //CSS
    define('CSS_PATH', SITE_PATH . 'view/css/');
    
    //JS
    define('JS_PATH', SITE_PATH . 'view/js/');
    
    //VENDOR
    define('VENDOR_PATH', SITE_PATH . 'view/vendor/');
    
    //IMG
    define('IMG_PATH', SITE_PATH . 'view/img/');
    
    //PRODUCTION
    define('PRODUCTION', true);
    
    //MODEL
    define('MODEL_PATH', SITE_ROOT . 'model/');
    
    //MODULES
    define('MODULES_PATH', SITE_ROOT . 'modules/');
    
    //VIEW
    define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');
    
    //RESOURCES
    define('RESOURCES', SITE_ROOT . 'resources/');
    
    //MEDIA
    define('MEDIA_PATH',SITE_ROOT . '/media/');
    
    //UTILS
    define('UTILS', SITE_ROOT . 'utils/');
    
    //MODEL_HOME
    define('UTILS_HOME', SITE_ROOT . 'modules/home/utils/');
    define('MODEL_PATH_HOME', SITE_ROOT . 'modules/home/model/');
    define('DAO_HOME', SITE_ROOT . 'modules/home/model/DAO/');
    define('BLL_HOME', SITE_ROOT . 'modules/home/model/BLL/');
    define('MODEL_HOME', SITE_ROOT . 'modules/home/model/model/');
    define('JS_VIEW_HOME', SITE_PATH . 'modules/home/view/js/');
    
    //MODEL_DOGS
    define('UTILS_DOGS', SITE_ROOT . 'modules/dogs/utils/');
    define('MODEL_PATH_DOGS', SITE_ROOT . 'modules/dogs/model/');
    define('DAO_DOGS', SITE_ROOT . 'modules/dogs/model/DAO/');
    define('BLL_DOGS', SITE_ROOT . 'modules/dogs/model/BLL/');
    define('MODEL_DOGS', SITE_ROOT . 'modules/dogs/model/model/');
    define('JS_VIEW_DOGS', SITE_PATH . 'modules/dogs/view/js/');
    
    //MODEL_ADOPTIONS
    define('UTILS_ADOPTIONS', SITE_ROOT . 'modules/adoptions/utils/');
    define('MODEL_PATH_ADOPTIONS', SITE_ROOT . 'modules/adoptions/model/');
    define('DAO_ADOPTIONS', SITE_ROOT . 'modules/adoptions/model/DAO/');
    define('BLL_ADOPTIONS', SITE_ROOT . 'modules/adoptions/model/BLL/');
    define('MODEL_ADOPTIONS', SITE_ROOT . 'modules/adoptions/model/model/');
    define('JS_VIEW_ADOPTIONS', SITE_PATH . 'modules/adoptions/view/js/');
    
    //MODEL_CONTACT
    define('UTILS_CONTACT', SITE_ROOT . 'modules/contact/utils/');
    define('MODEL_PATH_CONTACT', SITE_ROOT . 'modules/contact/model/');
    define('DAO_CONTACT', SITE_ROOT . 'modules/contact/model/DAO/');
    define('BLL_CONTACT', SITE_ROOT . 'modules/contact/model/BLL/');
    define('MODEL_CONTACT', SITE_ROOT . 'modules/contact/model/model/');
    define('JS_VIEW_CONTACT', SITE_PATH . 'modules/contact/view/js/');
    
    //MODEL_UBICATION
    define('UTILS_UBICATION', SITE_ROOT . 'modules/ubication/utils/');
    define('MODEL_PATH_UBICATION', SITE_ROOT . 'modules/ubication/model/');
    define('DAO_UBICATION', SITE_ROOT . 'modules/ubication/model/DAO/');
    define('BLL_UBICATION', SITE_ROOT . 'modules/ubication/model/BLL/');
    define('MODEL_UBICATION', SITE_ROOT . 'modules/ubication/model/model/');
    define('JS_VIEW_UBICATION', SITE_PATH . 'modules/ubication/view/js/');
    
    //MODEL_LOGIN
    define('UTILS_LOGIN', SITE_ROOT . 'modules/login/utils/');
    define('MODEL_PATH_LOGIN', SITE_ROOT . 'modules/login/model/');
    define('DAO_LOGIN', SITE_ROOT . 'modules/login/model/DAO/');
    define('BLL_LOGIN', SITE_ROOT . 'modules/login/model/BLL/');
    define('MODEL_LOGIN', SITE_ROOT . 'modules/login/model/model/');
    define('JS_VIEW_LOGIN', SITE_PATH . 'modules/login/view/js/');
    
    //amigables
    define('URL_AMIGABLES', TRUE);

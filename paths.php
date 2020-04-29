<?php

define ('PROJECT', '/Programacion/Tema5_1.0/Tema5_1.0/Framework/');

 //SITE_ROOT
 define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);
    
 //SITE_PATH
 define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

 //CSS
 define('CSS_PATH', SITE_PATH . 'view/css/');
 define ('CSS_PLANTILLA_PATH', SITE_PATH .'view/smoth-corporate-html-template/smoth/');
 
 //JS
 define('JS_PATH', SITE_PATH . 'view/js/');

  //MODEL
  define('MODEL_PATH', SITE_ROOT . 'model/');
    
  //MODULES
  define('MODULES_PATH', SITE_ROOT . 'module/');
  
  //VIEW
  define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');
  
  //RESOURCES
  define('RESOURCES', SITE_ROOT . 'resources/');

  //UTILS
  define('UTILS', SITE_ROOT . 'utils/');

  //MODEL CONTACT
  define('MODEL_PATH_CONTACT', SITE_ROOT . 'module/contact/model/');
  define('JS_VIEW_CONTACT', SITE_PATH . 'module/contact/view/js/');

//   define('UTILS_CONTACT', SITE_ROOT . 'modules/contact/utils/');
//   define('DAO_CONTACT', SITE_ROOT . 'modules/contact/model/DAO/');
//   define('BLL_CONTACT', SITE_ROOT . 'modules/contact/model/BLL/');
//   define('MODEL_CONTACT', SITE_ROOT . 'modules/contact/model/model/');

  //MODEL SEARCH

  define('MODEL_PATH_SEARCH', SITE_ROOT. 'module/search/model/');
  define('JS_VIEW_SEARCH', SITE_PATH. 'module/search/view/js/');

  //MODEL HOME
  define('MODEL_PATH_HOME', SITE_ROOT).'module/home/model/';
  define('JS_VIEW_HOME',SITE_PATH. 'module/home/view/');

  //MODEL LOGIN
  define('MODEL_PATH_LOGIN', SITE_ROOT. 'module/login/model/');
  define('JS_VIEW_LOGIN',SITE_PATH. 'module/login/view/js/');

  //MODEL SHOP
  define('MODEL_PATH_SHOP',SITE_ROOT.'module/shop/model/');
  define('JS_VIEW_SHOP',SITE_PATH.'module/shop/view/');

  //MODEL CART
  define('MODEL_PATH_CART',SITE_ROOT.'module/cart/model/');
  define('JS_VIEW_CART',SITE_PATH.'module/cart/view/js/');


  //TESTS
  define('TEST_PATH', SITE_ROOT . 'Tests/');

  //amigables
  define('URL_AMIGABLES', TRUE);
?>
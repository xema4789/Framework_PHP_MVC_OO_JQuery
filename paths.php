<?php

define ('PROJECT', '/Programacion/Tema5_1.0/Tema5_1.0/Framework/');

 //SITE_ROOT
 define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);
    
 //SITE_PATH
 define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

 //CSS
 define('CSS_PATH', SITE_PATH . 'view/css/');
 
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

?>
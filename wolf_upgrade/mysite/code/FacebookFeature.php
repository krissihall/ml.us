<?php
/**
 * Defines the FacebookFeature page type
 */
 
class FacebookFeature extends Page {
   static $db = array(
   		
   );
   static $has_one = array(
   );
   static $defaults = array(
		'ProvideComments' => false,
		'ShowInMenus' => false,
		'ShowInSearch' => false
   );
}
 
class FacebookFeature_Controller extends Page_Controller {
     
}
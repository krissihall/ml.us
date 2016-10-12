<?php
/**
 * Defines the HomePage page type
 */
 
class FanfictionCategory extends Page {
   static $db = array(
		
   );
   static $has_one = array(
   );
   
   static $allowed_children = array('Fanfiction');
}
 
class FanfictionCategory_Controller extends Page_Controller {
     
}
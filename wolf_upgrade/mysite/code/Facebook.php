<?php
/**
 * Defines the Facebook page type
 */
 
class Facebook extends Page {
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
 
class Facebook_Controller extends Page_Controller {
     public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates 
		// instead of putting Requirements calls here.  However these are 
		// included so that our older themes still work
		Requirements::themedCSS('facebook');
	}
	
	function FacebookFeature() { 
		$where = "ClassName = 'Fanfiction' AND FeatureOnFacebook = 1";
		return DataObject::get("SiteTree", $where);
	}
}
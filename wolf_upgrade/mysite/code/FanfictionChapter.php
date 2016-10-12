<?php
/**
 * Defines the HomePage page type
 */
 
class FanfictionChapter extends Page {
   static $db = array(
   		'IsExplicit'=>'Boolean',
		'ChapterTitle'=>'Text',
		'Added'=>'Date'
   );
   static $has_one = array(
   );
   static $defaults = array(
		'ProvideComments' => true
   );
   
   function getCMSFields() {
        $fields = parent::getCMSFields();
		
		$fields->addFieldToTab('Root.Main', new CheckboxField('IsExplicit','Contains Explicit Content'), 'Content');		
        $fields->addFieldToTab('Root.Main', new TextField('ChapterTitle','Chapter Title'), 'Content');
		
		$fields->addFieldToTab('Root.Main', $dateField = new DateField('Added','Added on (for example: 12/20/2010)'), 'Content');
		$dateField->setConfig('showcalendar', true);
		$dateField->setConfig('dateformat', 'MM/dd/YYYY');
         
        return $fields;
    }
}
 
class FanfictionChapter_Controller extends Page_Controller {
     
}
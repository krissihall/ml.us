<?php

class Genre extends DataObject {
	static $db = array(
		'Name'=>'Varchar'
	);
	static $has_many = array(
		'Fanfiction'=>'Fanfiction'
	);
   
   function getCMSFields() {
        $fields = parent::getCMSFields();
		
		$fields->addFieldToTab("Root.Main", new TextField('Name', 'Genre Name')); 
		         
        return $fields;
    }
}

class Character extends DataObject {
	static $db = array(
		'Name'=>'Varchar'
	);
	static $has_many = array(
		'Fanfiction'=>'Fanfiction'
	);
   
   function getCMSFields() {
        $fields = parent::getCMSFields();
		
		$fields->addFieldToTab("Root.Main", new TextField('Name', 'Character Name')); 
		         
        return $fields;
    }
}
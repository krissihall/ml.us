<?php
/**
 * Defines the HomePage page type
 */

class Fanfiction extends Page {
  static $db = array(
    'Description'=>'Text',
    'FeatureOnFacebook'=>'Boolean',
    'Rating'=>'Enum("K,K+,T,M,MA","T")',
    'StoryStatus'=>'Enum("Complete,Incomplete,Hiatus","Incomplete")',
    'Type'=>'Enum("One-shot,Chaptered","Chaptered")',
    'Added'=>'Date'
  );
  static $has_one = array(
       'CoverImage'=>'Image'
  );
  static $many_many = array(
    'Genres'=>'Genre',
    'Characters'=>'Character'
  );
  static $allowedExtensions = array(
    'jpg','gif','png', 'svg'
  );

  function getCMSFields() {
    $fields = parent::getCMSFields();

    $fields->addFieldToTab('Root.Main', new TextField('Description','Story Summary'), 'Content');
    $fields->addFieldToTab('Root.Main', new CheckboxField('FeatureOnFacebook', 'Feature on Facebook'), 'Content');
    $fields->addFieldToTab('Root.Main', new ImageField('CoverImage', 'Cover Image'), 'Content');

    $fields->addFieldToTab('Root.Main', new DropdownField('Rating','Story Rating', $this->dbObject('Rating')->enumValues()), 'Content');
    $fields->addFieldToTab('Root.Main', new DropdownField('StoryStatus','Story Status', $this->dbObject('StoryStatus')->enumValues()), 'Content');
    $fields->addFieldToTab('Root.Main', new DropdownField('Type','Story Type', $this->dbObject('Type')->enumValues()), 'Content');

    $fields->addFieldToTab('Root.Main', $dateField = new DateField('Added','Added on (for example: 12/20/2010)'), 'Content');
    $dateField->setConfig('showcalendar', true);
    $dateField->setConfig('dateformat', 'MM/dd/YYYY');

    $characters= DataObject::get('Character');

    if (!empty($characters)) {
      // create an array('ID'=>'Name')
      $characterMap = $characters->map("ID", "Name", "Please Select");

      // create a Checkbox group based on the array
      $fields->addFieldToTab('Root.Characters',
        new CheckboxSetField(
          $name = "Characters",
          $title = "Select Characters",
          $source = $characterMap
        )
      );
    }

    $genres= DataObject::get('Genre');

    if (!empty($genres)) {
      // create an array('ID'=>'Name')
      $genreMap = $genres->map("ID", "Name", "Please Select");

      // create a Checkbox group based on the array
      $fields->addFieldToTab('Root.Genres',
        new CheckboxSetField(
          $name = "Genres",
          $title = "Select Genres",
          $source = $genreMap
        )
      );
    }

    return $fields;
  }

  static $allowed_children = array('FanfictionChapter');
}

class Fanfiction_Controller extends Page_Controller {

}

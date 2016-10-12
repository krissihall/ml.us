<?php
class Page extends SiteTree {

	public static $db = array(
	);

	public static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates
		// instead of putting Requirements calls here.  However these are
		// included so that our older themes still work
		Requirements::themedCSS('style');
		Requirements::themedCSS('layout');
		Requirements::themedCSS('typography');
		Requirements::themedCSS('form');
	}

	function LimitedChildren($limit) {
		return DataObject::get("SiteTree", "ParentID = $this->ID", null, $limit);
	}

	function Siblings() {
		$whereStatement = "ParentID = ".$this->ParentID;
		return DataObject::get("Page", $whereStatement);
	}

	public function nextPager() {
		$where = "ParentID = ($this->ParentID + 0) AND Sort > ($this->Sort + 0 )";
		$pages = DataObject::get("SiteTree", $where, "Sort", "", 1);
		if($pages) {
			foreach($pages as $page) {
				return $page;
			}
		}
	}

	 public function previousPager() {
		$where = "ParentID = ($this->ParentID + 0) AND Sort < ($this->Sort + 0)";
		$pages = DataObject::get("SiteTree", $where, "Sort DESC", "", 1);
		if($pages) {
			foreach($pages as $page) {
				return $page;
			}
		}
	}

	public function WordCount($str){
       $words = 0;
       $str = eregi_replace(" +", " ", $str);
       $array = explode(" ", $str);
       for($i=0;$i < count($array);$i++)
       {
          if (eregi("[0-9A-Za-zÀ-ÖØ-öø-ÿ]", $array[$i]))
             $words++;
       }
       return $words;
    }

	public function GetChildren($Limit){
		$Children = $this->Children();
		return $Children->getRange(0, $Limit);
	}

	// this method belongs to your Page Class
	// or the class that holds the sortable children
	public function SortedChildren(){
	   // $children will be a DataObjectSet
	   $children = $this->Children();

	   if( !$children )
		  return null; // no children, nothing to work with

	   // sort the DataObjectSet
	   // see http://doc.silverstripe.com/doku.php?id=dataobjectset#sorting
	   $children->sort('Added');

	   // return sorted set
	   return $children;
	}

	public function ChildrenSortTest() {
		return DataObject::get('Story', '"ParentID" = ' . $this->ID, 
		'"LastEdited" DESC, "Created" DESC, "Added" DESC');
	}

}

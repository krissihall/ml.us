<?php

/**
 * Represents a single comment object.
 * 
 * @package comments
 */
class Comment extends DataObject {
	
	public static $db = array(
		"Name"			=> "Varchar(200)",
		"Comment"		=> "Text",
		"Email"			=> "Varchar(200)",
		"URL"			=> "Varchar(255)",
		"BaseClass"		=> "Varchar(200)",
		"Moderated"		=> "Boolean",
		"IsSpam"		=> "Boolean",
		"ParentID"		=> "Int"
	);

	public static $has_one = array(
		"Author"		=> "Member"
	);
	
	public static $default_sort = "Created DESC";
	
	public static $has_many = array();
	
	public static $many_many = array();
	
	public static $defaults = array(
		"Moderated" => true
	);
	
	public static $casting = array(
		'AuthorName' => 'Varchar',
		'RSSName' => 'Varchar'
	);

	public static $searchable_fields = array(
		'Name',
		'Email',
		'Comment',
		'Created',
		'BaseClass',
	);
	
	public static $summary_fields = array(
		'Name' => 'Submitted By',
		'Email' => 'Email',
		'Comment' => 'Comment',
		'Created' => 'Date Posted',
		'ParentTitle' => 'Parent',
		'IsSpam' => 'Is Spam'
	);


	
	/**
	 * Migrates the old {@link PageComment} objects to {@link Comment}
	 */
	public function requireDefaultRecords() {
		parent::requireDefaultRecords();
		
		if(DB::getConn()->hasTable('PageComment')) {
			$comments = DB::query("SELECT * FROM \"PageComment\"");
			
			if($comments) {
				while($pageComment = $comments->nextRecord()) {
					// create a new comment from the older page comment
					$comment = new Comment();
					$comment->update($pageComment);
					
					// set the variables which have changed
					$comment->BaseClass = 'SiteTree';
					$comment->URL = (isset($pageComment['CommenterURL'])) ? $pageComment['CommenterURL'] : "";
					
					$comment->write();
				}
			}
			
			DB::alteration_message("Migrated PageComment to Comment","changed");
			DB::getConn()->dontRequireTable('PageComment');
		}
	}
	 
	/**
	 * Return a link to this comment
	 *
	 * @return string link to this comment.
	 */
	public function Link($action = "") {
		return $this->getParent()->Link($action) . '#' . $this->Permalink();
	}
	
	/**
	 * Returns the permalink for this {@link Comment}. Inserted into
	 * the ID tag of the comment
	 *
	 * @return string
	 */
	public function Permalink() {
		$prefix = Commenting::get_config_value($this->BaseClass, 'comment_permalink_prefix');
		
		return $prefix . $this->ID;
	}
	
	/**
	 * Translate the form field labels for the CMS administration
	 *
	 * @param boolean $includerelations
	 */
	public function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['Name'] = _t('Comment.NAME', 'Author Name');
		$labels['Comment'] = _t('Comment.COMMENT', 'Comment');
		$labels['IsSpam'] = _t('Comment.ISSPAM', 'Spam?');
		$labels['Moderated'] = _t('Comment.MODERATED', 'Moderated?');
		
		return $labels;
	}
	
	/**
	 * Returns the parent {@link DataObject} this comment is attached too
	 *
	 * @return DataObject
	 */
	public function getParent() {
		if(!$this->BaseClass) $this->BaseClass = "SiteTree";
		
		return DataObject::get_by_id($this->BaseClass, $this->ParentID);
	}


	/**
	 * Returns a string to help identify the parent of the comment
	 *
	 * @return string
	 */
	public function getParentTitle(){
		$parent = $this->getParent();

		return ($parent->Title) ? $parent->Title : $parent->ClassName . " #" . $parent->ID;
	}
	
	/**
	 * @todo needs to compare to the new {@link Commenting} configuration API
	 *
	 * @return Boolean
	 */
	public function canCreate($member = null) {
		return false;
	}

	/**
	 * Checks for association with a page, and {@link SiteTree->ProvidePermission} 
	 * flag being set to true.
	 * 
	 * @param Member $member
	 * @return Boolean
	 */
	public function canView($member = null) {
		if(!$member) $member = Member::currentUser();
		
		// Standard mechanism for accepting permission changes from decorators
		$extended = $this->extendedCan('canView', $member);
		if($extended !== null) return $extended;
		
		$page = $this->getParent();
		return (
			($page && $page->ProvideComments)
			|| (bool)Permission::checkMember($member, 'CMS_ACCESS_CommentAdmin')
		);
	}
	
	/**
	 * Checks for "CMS_ACCESS_CommentAdmin" permission codes and 
	 * {@link canView()}. 
	 * 
	 * @param Member $member
	 * @return Boolean
	 */
	public function canEdit($member = null) {
		if(!$member) $member = Member::currentUser();
		
		// Standard mechanism for accepting permission changes from decorators
		$extended = $this->extendedCan('canEdit', $member);
		if($extended !== null) return $extended;
		
		if(!$this->canView($member)) return false;
		
		return (bool)Permission::checkMember($member, 'CMS_ACCESS_CommentAdmin');
	}
	
	/**
	 * Checks for "CMS_ACCESS_CommentAdmin" permission codes and 
	 * {@link canEdit()}.
	 * 
	 * @param Member $member
	 * @return Boolean
	 */
	public function canDelete($member = null) {
		if(!$member) $member = Member::currentUser();
		
		// Standard mechanism for accepting permission changes from decorators
		$extended = $this->extendedCan('canDelete', $member);
		if($extended !== null) return $extended;
		
		return $this->canEdit($member);
	}

	/**
	 * Return the authors name for the comment
	 *
	 * @return string
	 */
	public function getAuthorName() {
		if($this->Name) {
			return $this->Name;
		} else if($this->Author()) {
			return $this->Author()->getName();
		}
	}

	/**
	 * @return string
	 */
	public function DeleteLink() {
		if($this->canDelete()) {
			$token = SecurityToken::inst();

			return DBField::create_field("Varchar", $token->addToUrl(sprintf(
				"CommentingController/delete/%s", (int) $this->ID
			)));
		}
	}
	
	/**
	 * @return string
	 */
	public function SpamLink() {
		if($this->canEdit() && !$this->IsSpam) {
			$token = SecurityToken::inst();

			return DBField::create_field("Varchar", $token->addToUrl(sprintf(
				"CommentingController/spam/%s", (int) $this->ID
			)));
		}
	}
	
	/**
	 * @return string
	 */
	public function HamLink() {
		if($this->canEdit() && $this->IsSpam) {
			$token = SecurityToken::inst();

			return DBField::create_field("Varchar", $token->addToUrl(sprintf(
				"CommentingController/ham/%s", (int) $this->ID
			)));
		}
	}
	
	/**
	 * @return string
	 */
	public function ApproveLink() {
		if($this->canEdit() && !$this->Moderated) {
			$token = SecurityToken::inst();

			return DBField::create_field("Varchar", $token->addToUrl(sprintf(
				"CommentingController/approve/%s", (int) $this->ID
			)));
		}
	}
	
	/**
	 * @return string
	 */
	public function SpamClass() {
		if($this->getField('IsSpam')) {
			return 'spam';
		} else if($this->getField('NeedsModeration')) {
			return 'unmoderated';
		} else {
			return 'notspam';
		}
	}
	
	/**
	 * @return string
	 */
	public function getTitle() {
		$title = sprintf(_t('Comment.COMMENTBY', "Comment by '%s'", 'Name'), $this->getAuthorName());

		if($parent = $this->getParent()) {
			if($parent->Title) {
				$title .= sprintf(" %s %s", _t('Comment.ON', 'on'), $parent->Title);
			}
		}

		return $title;
	}
}

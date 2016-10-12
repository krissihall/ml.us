<?php
if ($scope->hasValue('CommentsEnabled', null, true)) { 
$val .= '
	<div id="';

$val .= $scope->XML_val('CommentHolderID', null, true);
$val .= '" class="comments-holder-container">
		<h4>';

$val .= _t($scope->XML_val('I18NNamespace').'.POSTCOM','Post your comment');
$val .= '</h4>
		
		';

if ($scope->hasValue('AddCommentForm', null, true)) { 
$val .= '
			';

if ($scope->hasValue('CanPost', null, true)) { 
$val .= '
				';

$val .= $scope->XML_val('AddCommentForm', null, true);
$val .= '
			';


}else { 
$val .= '
				<p>';

$val .= _t($scope->XML_val('I18NNamespace').'.COMMENTLOGINERROR','You cannot post comments until you have logged in');
if ($scope->hasValue('PostingRequiresPermission', null, true)) { 
$val .= ',';

$val .= _t($scope->XML_val('I18NNamespace').'.COMMENTPERMISSIONERROR','and that you have an appropriate permission level');

}
$val .= '. 
					<a href="Security/login?BackURL=';

$val .= $scope->obj('Page', null, true)->XML_val('Link', null, true);
$val .= '" title="';

$val .= _t($scope->XML_val('I18NNamespace').'.LOGINTOPOSTCOMMENT','Login to post a comment');
$val .= '">';

$val .= _t($scope->XML_val('I18NNamespace').'.COMMENTPOSTLOGIN','Login Here');
$val .= '</a>.
				</p>
			';


}
$val .= '
		';


}else { 
$val .= '
			<p>';

$val .= _t($scope->XML_val('I18NNamespace').'.COMMENTSDISABLED','Posting comments has been disabled');
$val .= '.</p>	
		';


}
$val .= '

		<h4>';

$val .= _t($scope->XML_val('I18NNamespace').'.COMMENTS','Comments');
$val .= '</h4>
	
		<div class="comments-holder">
			';

if ($scope->hasValue('Comments', null, true)) { 
$val .= '
				<ul class="comments-list">
					';

$scope->obj('Comments', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
						<li class="comment ';

$val .= $scope->XML_val('EvenOdd', null, true);
if ($scope->hasValue('FirstLast', null, true)) { 
$val .= ' ';

$val .= $scope->XML_val('FirstLast', null, true);
$val .= ' ';


}
$val .= ' ';

$val .= $scope->XML_val('SpamClass', null, true);
$val .= '">
							';

$val .= SSViewer::execute_template('CommentsInterface_singlecomment', $scope->getItem(), array());

$val .= '
						</li>
					';


}; $scope->popScope(); 
$val .= '
				</ul>
			
				';

if ($scope->obj('Comments', null, true)->hasValue('MoreThanOnePage', null, true)) { 
$val .= '
					<div class="comments-pagination">
						<p>
							';

if ($scope->obj('Comments', null, true)->hasValue('PrevLink', null, true)) { 
$val .= '
								<a href="';

$val .= $scope->obj('Comments', null, true)->XML_val('PrevLink', null, true);
$val .= '" class="previous">&laquo; ';

$val .= _t($scope->XML_val('I18NNamespace').'.PREV','previous');
$val .= '</a>
							';


}
$val .= '
					
							';

if ($scope->obj('Comments', null, true)->hasValue('Pages', null, true)) { 
$val .= '
								';

$scope->obj('Comments', null, true)->obj('Pages', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
									';

if ($scope->hasValue('CurrentBool', null, true)) { 
$val .= '
										<strong>';

$val .= $scope->XML_val('PageNum', null, true);
$val .= '</strong>
									';


}else { 
$val .= '
										<a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '">';

$val .= $scope->XML_val('PageNum', null, true);
$val .= '</a>
									';


}
$val .= '
								';


}; $scope->popScope(); 
$val .= '
							';


}
$val .= '
	
							';

if ($scope->obj('Comments', null, true)->hasValue('NextLink', null, true)) { 
$val .= '
								<a href="';

$val .= $scope->obj('Comments', null, true)->XML_val('NextLink', null, true);
$val .= '" class="next">';

$val .= _t($scope->XML_val('I18NNamespace').'.NEXT','next');
$val .= ' &raquo;</a>
							';


}
$val .= '
						</p>
					</div>
				';


}
$val .= '
			';


}else { 
$val .= '
				<p class="no-comments-yet">';

$val .= _t($scope->XML_val('I18NNamespace').'.NOCOMMENTSYET','No one has commented on this page yet.');
$val .= '</p>
			';


}
$val .= '
		</div>
		
		';

if ($scope->hasValue('DeleteAllLink', null, true)) { 
$val .= '
			<p class="delete-comments">
				<a href="';

$val .= $scope->XML_val('DeleteAllLink', null, true);
$val .= '">';

$val .= _t('PageCommentInterface.DELETEALLCOMMENTS','Delete all comments on this page');
$val .= '</a>
			</p>
		';


}
$val .= '

		<p class="commenting-rss-feed">
			<a href="';

$val .= $scope->XML_val('RssLinkPage', null, true);
$val .= '">';

$val .= _t($scope->XML_val('I18NNamespace').'.RSSFEEDCOMMENTS','RSS feed for comments on this page');
$val .= '</a> | 
			<a href="';

$val .= $scope->XML_val('RssLink', null, true);
$val .= '">';

$val .= _t($scope->XML_val('I18NNamespace').'.RSSFEEDALLCOMMENTS','RSS feed for all comments');
$val .= '</a>
		</p>
	</div>
';


}
$val .= '
	
';


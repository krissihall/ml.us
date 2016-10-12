<?php
$val .= '<div class="comment" id="';

$val .= $scope->XML_val('Permalink', null, true);
$val .= '">
	<p>';

$val .= $scope->obj('Comment', null, true)->XML_val('XML', null, true);
$val .= '</p>
</div>

<p class="info">
	';

if ($scope->hasValue('URL', null, true)) { 
$val .= '
		';

$val .= _t($scope->XML_val('I18NNamespace').'.PBY','Posted by');
$val .= ' <a href="';

$val .= $scope->obj('URL', null, true)->XML_val('URL', null, true);
$val .= '" rel="nofollow">';

$val .= $scope->obj('AuthorName', null, true)->XML_val('XML', null, true);
$val .= '</a>, ';

$val .= $scope->obj('Created', null, true)->XML_val('Nice', null, true);
$val .= ' (';

$val .= $scope->obj('Created', null, true)->XML_val('Ago', null, true);
$val .= ')
	';


}else { 
$val .= '
		';

$val .= _t($scope->XML_val('I18NNamespace').'.PBY','Posted by');
$val .= ' ';

$val .= $scope->obj('AuthorName', null, true)->XML_val('XML', null, true);
$val .= ', ';

$val .= $scope->obj('Created', null, true)->XML_val('Nice', null, true);
$val .= ' (';

$val .= $scope->obj('Created', null, true)->XML_val('Ago', null, true);
$val .= ')
	';


}
$val .= '
</p>

';

if ($scope->hasValue('ApproveLink', null, true)||$scope->hasValue('SpamLink', null, true)||$scope->hasValue('HamLink', null, true)||$scope->hasValue('DeleteLink', null, true)) { 
$val .= '
	<ul class="action-links">
		';

if ($scope->hasValue('ApproveLink', null, true)) { 
$val .= '
			<li><a href="';

$val .= $scope->obj('ApproveLink', null, true)->XML_val('ATT', null, true);
$val .= '" class="approve">';

$val .= _t($scope->XML_val('I18NNamespace').'.APPROVE','approve this comment');
$val .= '</a></li>
		';


}
$val .= '
		';

if ($scope->hasValue('SpamLink', null, true)) { 
$val .= '
			<li><a href="';

$val .= $scope->obj('SpamLink', null, true)->XML_val('ATT', null, true);
$val .= '" class="spam">';

$val .= _t($scope->XML_val('I18NNamespace').'.ISSPAM','this comment is spam');
$val .= '</a></li>
		';


}
$val .= '
		';

if ($scope->hasValue('HamLink', null, true)) { 
$val .= '
			<li><a href="';

$val .= $scope->obj('HamLink', null, true)->XML_val('ATT', null, true);
$val .= '" class="ham">';

$val .= _t($scope->XML_val('I18NNamespace').'.ISNTSPAM','this comment is not spam');
$val .= '</a></li>
		';


}
$val .= '
		';

if ($scope->hasValue('DeleteLink', null, true)) { 
$val .= '
			<li class="last"><a href="';

$val .= $scope->obj('DeleteLink', null, true)->XML_val('ATT', null, true);
$val .= '" class="delete">';

$val .= _t($scope->XML_val('I18NNamespace').'.REMCOM','remove this comment');
$val .= '</a></li>
		';


}
$val .= '
	</ul>
';


}
$val .= '
';


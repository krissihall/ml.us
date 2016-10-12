<?php
if ($scope->hasValue('Pages', null, true)) { 
$val .= '
	';

$scope->obj('Pages', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
		';

if ($scope->hasValue('Last', null, true)) { 
$val .= $scope->obj('Title', null, true)->XML_val('XML', null, true);

}else { 
$val .= '<a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '">';

$val .= $scope->obj('MenuTitle', null, true)->XML_val('XML', null, true);
$val .= '</a> &raquo;';


}
$val .= '
	';


}; $scope->popScope(); 
$val .= '
';


}

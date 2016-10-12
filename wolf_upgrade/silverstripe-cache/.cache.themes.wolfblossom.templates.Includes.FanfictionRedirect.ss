<?php
if ($scope->hasValue('CoverImage', null, true)) { 
$val .= '
';

$val .= $scope->XML_val('Link', null, true);
$val .= '
';


}else { 
$val .= '
	';

if ($scope->hasValue('Children', null, true)) { 
$val .= '
    	';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
        	';

if ($scope->hasValue('First', null, true)) { 
$val .= '
            	';

$val .= $scope->XML_val('Link', null, true);
$val .= '
            ';


}
$val .= '
        ';


}; $scope->popScope(); 
$val .= '
    ';


}else { 
$val .= '
    	';

$val .= $scope->XML_val('Link', null, true);
$val .= '
    ';


}
$val .= '
';


}

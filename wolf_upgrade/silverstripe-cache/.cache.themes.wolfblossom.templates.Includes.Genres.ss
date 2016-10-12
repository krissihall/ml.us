<?php
if ($scope->hasValue('Genres', null, true)) { 
$val .= '
    ';

$scope->obj('Genres', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
        ';

if ($scope->hasValue('Last', null, true)) { 
$val .= '
            ';

$val .= $scope->XML_val('Name', null, true);
$val .= '
        ';


}else { 
$val .= '
            ';

$val .= $scope->XML_val('Name', null, true);
$val .= ', 
        ';


}
$val .= '
    ';


}; $scope->popScope(); 
$val .= '
';


}else { 
$val .= '
	General
';


}

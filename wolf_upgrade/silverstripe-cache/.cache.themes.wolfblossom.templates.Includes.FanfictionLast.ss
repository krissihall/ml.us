<?php
if ($scope->XML_val('Type', null, true)=='One-shot') { 
$val .= '

';


}else { 
$val .= '
    ';

if ($scope->hasValue('Children', null, true)) { 
$val .= '
        <span class="label">Updated:</span> 
        ';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
        	';

if ($scope->hasValue('Last', null, true)) { 
$val .= '
                ';

$val .= $scope->obj('Added', null, true)->XML_val('format', array('m/d/Y'), true);
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


}
$val .= '
';


}

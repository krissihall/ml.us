<?php
$val .= '<span class="label">Chapters:</span> 
';

if ($scope->hasValue('Children', null, true)) { 
$val .= '
    ';

$val .= $scope->obj('Children', null, true)->XML_val('count', null, true);
$val .= ' chapters
';


}else { 
$val .= '
	1 chapter
';


}

<?php
if ($scope->hasValue('Level', array('2'), true)) { 
$val .= '<div class="breadcrumbs">	';

$val .= $scope->XML_val('Breadcrumbs', null, true);
$val .= '</div>';


}

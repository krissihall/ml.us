<?php
$val .= SSViewer::execute_template('Breadcrumbs', $scope->getItem(), array());

$val .= '
';

$val .= $scope->XML_val('Content', null, true);
$val .= '

';

if ($scope->XML_val('Title', null, true)=='Fanfiction') { 
$val .= '
	';

$val .= SSViewer::execute_template('MostRecent', $scope->getItem(), array());

$val .= '
';


}

<?php
$val .= SSViewer::execute_template('Breadcrumbs', $scope->getItem(), array());

$val .= '
<div id="chapter">
';

$scope->obj('Parent', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
	';

$val .= SSViewer::execute_template('StoryOverview', $scope->getItem(), array());

$val .= '
';


}; $scope->popScope(); 
$val .= '
';

$val .= SSViewer::execute_template('FanfictionNav', $scope->getItem(), array());

$val .= '
';

$scope->obj('wordCount', array('Content'), true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
	
';


}; $scope->popScope(); 
$val .= '

';

if ($scope->hasValue('IsExplicit', null, true)) { 
$val .= '
	<div id="blur" class="blur">
';


}
$val .= '

';

if (($partial = $cache->load('2087d554b6aee6d46806197bcdfa4a328036ac99'.'_1'))) $val .= $partial;
else { $oldval = $val; $val = "";
$val .= '
	';

$val .= $scope->XML_val('Content', null, true);
$val .= '
';


 $cache->save($val); $val = $oldval . $val;
}
$val .= '

';

if ($scope->hasValue('IsExplicit', null, true)) { 
$val .= '
	</div>
';


}
$val .= '

';

$val .= SSViewer::execute_template('FanfictionNav', $scope->getItem(), array());

$val .= '
';

$val .= SSViewer::execute_template('FanfictionPagination', $scope->getItem(), array());

$val .= '
</div>';


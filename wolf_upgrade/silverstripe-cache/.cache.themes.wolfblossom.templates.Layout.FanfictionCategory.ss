<?php
$val .= SSViewer::execute_template('Breadcrumbs', $scope->getItem(), array());

$val .= '
';

$val .= $scope->XML_val('Content', null, true);
$val .= '

<div class="stories">
	';

if ($scope->hasValue('Children', null, true)) { 
$val .= '
    	';

if (($partial = $cache->load('1aeb9bab4c861ed994538aebe6912d10afc9aee3'.'_1'))) $val .= $partial;
else { $oldval = $val; $val = "";
$val .= '
            ';

$val .= SSViewer::execute_template('Complete', $scope->getItem(), array());

$val .= '
            ';

$val .= SSViewer::execute_template('Incomplete', $scope->getItem(), array());

$val .= '
            ';

$val .= SSViewer::execute_template('OneShots', $scope->getItem(), array());

$val .= '
            ';

$val .= SSViewer::execute_template('Hiatus', $scope->getItem(), array());

$val .= '
        ';


 $cache->save($val); $val = $oldval . $val;
}
$val .= '
    ';


}
$val .= '
</div>';


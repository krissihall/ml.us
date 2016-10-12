<?php
$val .= '<h2>Most Recent</h2>

';

if (($partial = $cache->load('3cb699e541fdcf0da57664f379dd20fdc59cea76'.'_1'))) $val .= $partial;
else { $oldval = $val; $val = "";
$val .= '
';

$scope->obj('ChildrenOf', array('fanfiction'), true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
	<h3><a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '" class="';

$val .= $scope->XML_val('LinkingMode', null, true);
$val .= '">';

$val .= $scope->XML_val('Title', null, true);
$val .= '</a></h3>
    ';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
        ';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
    		';

if ($scope->hasValue('Last', null, true)) { 
$val .= '
                ';

$scope->obj('Parent', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
                	<!--<a href=\'';

if ($scope->XML_val('Type', null, true)=='One-shot') { 
$val .= SSViewer::execute_template('FanfictionRedirect', $scope->getItem(), array());


}else { 
$val .= $scope->XML_val('Link', null, true);

}
$val .= '\' class="';

$val .= $scope->XML_val('LinkingMode', null, true);
$val .= '">';

$val .= $scope->XML_val('MenuTitle', null, true);
$val .= '</a><br />-->
                    ';

$val .= SSViewer::execute_template('StoryOverview', $scope->getItem(), array());

$val .= '
                ';


}; $scope->popScope(); 
$val .= '
        	';


}
$val .= '
        ';


}; $scope->popScope(); 
$val .= '
    ';


}; $scope->popScope(); 
$val .= '
';


}; $scope->popScope(); 
$val .= '
';


 $cache->save($val); $val = $oldval . $val;
}

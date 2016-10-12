<?php
$val .= '<div class="pagination">
';

if ($scope->hasValue('previousPager', null, true)) { 
$val .= '
	<a href="';

$val .= $scope->obj('previousPager', null, true)->XML_val('Link', null, true);
$val .= '" class="prev">&laquo; ';

$val .= $scope->obj('previousPager', null, true)->XML_val('Title', null, true);
$val .= '</a>
';


}
$val .= '

';

if ($scope->hasValue('nextPager', null, true)) { 
$val .= '
	<a href="';

$val .= $scope->obj('nextPager', null, true)->XML_val('Link', null, true);
$val .= '" class="next">';

$val .= $scope->obj('nextPager', null, true)->XML_val('Title', null, true);
$val .= ' &raquo;</a>
';


}
$val .= '
<div class="clear"></div>
</div>';


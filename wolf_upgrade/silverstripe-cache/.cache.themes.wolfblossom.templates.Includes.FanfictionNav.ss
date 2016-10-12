<?php
$val .= '<div class="ffSelect">
	';

if ($scope->obj('Siblings', null, true)->XML_val('count', null, true)!='0') { 
$val .= '
	<form action="#">
        <select class="newLocation">
        ';

$scope->obj('Siblings', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
            <option value="';

$val .= $scope->XML_val('Link', null, true);
$val .= '">';

$val .= $scope->XML_val('Title', null, true);
if ($scope->XML_val('ChapterTitle', null, true)!='') { 
$val .= ' &ndash; ';

$val .= $scope->XML_val('ChapterTitle', null, true);

}
$val .= '</option>
        ';


}; $scope->popScope(); 
$val .= '
        </select>
    </form>
    ';


}
$val .= '
</div>';


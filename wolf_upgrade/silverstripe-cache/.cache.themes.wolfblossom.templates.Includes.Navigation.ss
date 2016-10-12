<?php
if (($partial = $cache->load('1d21b4576703213b5f279e1c0bf45af569abb6e5_'.sha1('navigation'.'_'.$scope->obj('List', array('Page'), true)->XML_val('max', array('LastEdited'), true)).'_1'))) $val .= $partial;
else { $oldval = $val; $val = "";
$val .= '
<ul id="navi">
	';

$scope->obj('Menu', array('1'), true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
		<li class="';

$val .= $scope->XML_val('LinkingMode', null, true);
$val .= '"><a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '" title="';

$val .= $scope->XML_val('Title', null, true);
$val .= '">';

$val .= $scope->XML_val('MenuTitle', null, true);
$val .= '</a>
		';

if ($scope->hasValue('Children', null, true)) { 
$val .= '
		<ul>
			';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
				<li class="';

$val .= $scope->XML_val('LinkingMode', null, true);
$val .= '"><a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '" title="';

$val .= $scope->XML_val('Title', null, true);
$val .= '">';

$val .= $scope->XML_val('MenuTitle', null, true);
$val .= '</a>
				';

if ($scope->hasValue('Children', null, true)) { 
$val .= '
					<ul>
						';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
							<li class="';

$val .= $scope->XML_val('LinkingMode', null, true);
$val .= '"><a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '" title="';

$val .= $scope->XML_val('Title', null, true);
$val .= '">';

$val .= $scope->XML_val('MenuTitle', null, true);
$val .= '</a>
								';

if ($scope->hasValue('Children', null, true)) { 
$val .= '
									<ul>
										';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
											<li class="';

$val .= $scope->XML_val('LinkingMode', null, true);
$val .= '"><a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '" title="';

$val .= $scope->XML_val('Title', null, true);
$val .= '">';

$val .= $scope->XML_val('MenuTitle', null, true);
$val .= '</a></li>
										';


}; $scope->popScope(); 
$val .= '
									</ul>
								';


}
$val .= '
							</li>
						';


}; $scope->popScope(); 
$val .= '
					</ul>
				';


}
$val .= '
				</li>
			';


}; $scope->popScope(); 
$val .= '
		</ul>
		';


}
$val .= '
	</li>
	';


}; $scope->popScope(); 
$val .= '
</ul>
<div class="clear"></div>
';


 $cache->save($val); $val = $oldval . $val;
}

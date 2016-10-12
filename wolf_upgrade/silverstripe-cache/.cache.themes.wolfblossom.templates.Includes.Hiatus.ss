<?php
if ($scope->hasValue('Children', null, true)) { 
$val .= '
	<a href="javascript:void(0);" class="show sectionHead">Hiatus</a>
    <div class="hidden">
	';

$scope->obj('Children', null, true); $scope->pushScope(); while (($key = $scope->next()) !== false) {
$val .= '
        ';

if ($scope->XML_val('Type', null, true)=='Chaptered') { 
$val .= '
        	';

if ($scope->XML_val('StoryStatus', null, true)=='Hiatus') { 
$val .= '
            <div class="story">
                ';

if ($scope->hasValue('ExternalLink', null, true)) { 
$val .= '
					<h3><a href="';

$val .= $scope->XML_val('ExternalLink', null, true);
$val .= '" target="_blank">';

$val .= $scope->XML_val('Title', null, true);
$val .= '</a></h3>
				';


}else { 
$val .= '
					<h3><a href="';

$val .= SSViewer::execute_template('FanfictionRedirect', $scope->getItem(), array());

$val .= '">';

$val .= $scope->XML_val('Title', null, true);
$val .= '</a></h3>
				';


}
$val .= '
                <p>
                    <span class="description">';

$val .= $scope->XML_val('Description', null, true);
$val .= '</span>
                    <span class="details"><strong>Details:</strong> Rating: ';

$val .= $scope->XML_val('Rating', null, true);
$val .= ' <span class="line">|</span> 
                    <strong>Genre(s):</strong> ';

$val .= SSViewer::execute_template('Genres', $scope->getItem(), array());

$val .= '
                    ';

if ($scope->hasValue('Characters', null, true)) { 
$val .= ' <span class="line">|</span> <strong>Character(s):</strong> ';

$val .= SSViewer::execute_template('Characters', $scope->getItem(), array());


}
$val .= '</span>
                    <span class="label">Published:</span> ';

$val .= $scope->obj('Added', null, true)->XML_val('format', array('m/d/Y'), true);
$val .= '<br />
                    ';

$val .= SSViewer::execute_template('FanfictionLast', $scope->getItem(), array());

$val .= '<br />
                    ';

$val .= SSViewer::execute_template('ChildCount', $scope->getItem(), array());

$val .= '<br />
                    <span class="label">Status:</span> ';

$val .= $scope->XML_val('StoryStatus', null, true);
$val .= '
                </p>
            </div>
            ';


}
$val .= '
        ';


}
$val .= '
    ';


}; $scope->popScope(); 
$val .= '
    </div>
';


}

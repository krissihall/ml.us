<?php
$val .= '<div class="overview story">
	';

if ($scope->hasValue('CoverImage', null, true)) { 
$val .= '
		';

$val .= $scope->XML_val('CoverImage', null, true);
$val .= '
	<div class="right">
    ';


}
$val .= '
		<div class="fbLike">
			<div class="fb-like" data-href="http://wolfblossom.mysticallegends.us';

$val .= $scope->XML_val('Link', null, true);
$val .= '" data-layout="box_count" data-send="false" data-width="44" data-show-faces="true"></div>
		</div>
		<h3><a href="';

$val .= $scope->XML_val('Link', null, true);
$val .= '">';

$val .= $scope->XML_val('Title', null, true);
$val .= '</a></h3>
		<p>';

$val .= $scope->XML_val('Description', null, true);
$val .= '</p>
        <div class="clear"></div>
	';

if ($scope->hasValue('CoverImage', null, true)) { 
$val .= '
    </div>
    ';


}
$val .= '
	<div class="clear"></div>
    <div class="details">
    	<span class="label">Details:</span> 
        <strong>Rating</strong> &ndash; ';

$val .= $scope->XML_val('Rating', null, true);
$val .= ' <span class="line">|</span> 
        <strong>Genre(s)</strong> &ndash; ';

$val .= SSViewer::execute_template('Genres', $scope->getItem(), array());

$val .= '
        ';

if ($scope->hasValue('Characters', null, true)) { 
$val .= ' <span class="line">|</span> <strong>Character(s)</strong> &ndash; ';

$val .= SSViewer::execute_template('Characters', $scope->getItem(), array());

$val .= ' <span class="line">|</span> ';


}
$val .= '
		';

$val .= SSViewer::execute_template('FanfictionLast', $scope->getItem(), array());

$val .= ' <span class="line">|</span> 
        <span class="label">Published:</span> ';

$val .= $scope->obj('Added', null, true)->XML_val('format', array('m/d/Y'), true);
$val .= ' <span class="line">|</span> 
        <span class="label">Chapters:</span> ';

if ($scope->hasValue('Children', null, true)) { 
$val .= $scope->obj('Children', null, true)->XML_val('count', null, true);

}
$val .= ' <span class="line">|</span> 
        <span class="label">Words:</span>
    </div>
</div><!-- closes overview -->';


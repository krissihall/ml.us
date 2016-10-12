<div class="overview story">
	<% if CoverImage %>
		$CoverImage
	<div class="right">
    <% end_if %>
		<div class="fbLike">
			<div class="fb-like" data-href="http://wolfblossom.mysticallegends.us$Link" data-layout="box_count" data-send="false" data-width="44" data-show-faces="true"></div>
		</div>
		<h3><a href="$Link">$Title</a></h3>
		<p>$Description</p>
        <div class="clear"></div>
	<% if CoverImage %>
    </div>
    <% end_if %>
	<div class="clear"></div>
    <div class="details">
    	<span class="label">Details:</span> 
        <strong>Rating</strong> &ndash; $Rating <span class="line">|</span> 
        <strong>Genre(s)</strong> &ndash; <% include Genres %>
        <% if Characters %> <span class="line">|</span> <strong>Character(s)</strong> &ndash; <% include Characters %> <span class="line">|</span> <% end_if %>
		<% include FanfictionLast %> <span class="line">|</span> 
        <span class="label">Published:</span> $Added.format(m/d/Y) <span class="line">|</span> 
        <span class="label">Chapters:</span> <% if Children %>$Children.count<% end_if %> <span class="line">|</span> 
        <span class="label">Words:</span>
    </div>
</div><!-- closes overview -->
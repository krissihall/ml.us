<% include Breadcrumbs %>
<h1>$Title</h1>
<p>$Description</p>

<% cache %>
$Content
<% end_cache %>
<div class="fbLike">
	<div class="fb-like" data-href="http://wolfblossom.mysticallegends.us$Link" data-layout="button_count" data-send="false" data-width="450" data-show-faces="true"></div>
</div>

	<% if CoverImage %>
	<div class="coverImage">
    	<a href="<% control Children %><% if First %>$Link<% end_if %><% end_control %>">$CoverImage</a>
    </div>
    <div class="buttons">
    	<a href="<% control Children %><% if First %>$Link<% end_if %><% end_control %>" class="readMore">Read Story</a>
    </div>
    <% else %>
    	<% cache %>
    	<% if Children %>
        	<h3>Table of Contents</h3>
			<ul id="tableOfContents">
        	<% control Children %>
    			<li><a href="$Link">$MenuTitle<% if ChapterTitle != "" %> &ndash; $ChapterTitle<% end_if %></a></li>
        	<% end_control %>
            </ul>
        <% end_if %>
        <% end_cache %>
	<% end_if %>
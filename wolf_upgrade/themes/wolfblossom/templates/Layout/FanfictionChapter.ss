<% include Breadcrumbs %>
<div id="chapter">
<% control Parent %>
	<% include StoryOverview %>
<% end_control %>
<% include FanfictionNav %>
<% control wordCount(Content) %>
	
<% end_control %>

<% if IsExplicit %>
	<div id="blur" class="blur">
<% end_if %>

<% cached %>
	$Content
<% end_cached %>

<% if IsExplicit %>
	</div>
<% end_if %>

<% include FanfictionNav %>
<% include FanfictionPagination %>
</div>
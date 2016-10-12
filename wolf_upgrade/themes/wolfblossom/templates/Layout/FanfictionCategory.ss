<% include Breadcrumbs %>
$Content

<div class="stories">
	<% if Children %>
    	<% cached %>
            <% include Complete %>
            <% include Incomplete %>
            <% include OneShots %>
            <% include Hiatus %>
        <% end_cached %>
    <% end_if %>
</div>
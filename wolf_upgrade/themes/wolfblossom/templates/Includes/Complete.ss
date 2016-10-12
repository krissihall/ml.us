<% if Children %>
	<a href="javascript:void(0);" class="show sectionHead">Complete</a>
    <div class="hidden">
	<% control Children %>
        <% if Type == "Chaptered" %>
        	<% if StoryStatus == "Complete" %>
            <div class="story">
				<% if ExternalLink %>
					<h3><a href="$ExternalLink" target="_blank">$Title</a></h3>
				<% else %>
					<h3><a href="<% include FanfictionRedirect %>">$Title</a></h3>
				<% end_if %>
				<p>
                    <span class="description">$Description</span>
                    <span class="details"><strong>Details:</strong> Rating: $Rating <span class="line">|</span> 
                    <strong>Genre(s):</strong> <% include Genres %>
                    <% if Characters %> <span class="line">|</span> <strong>Character(s):</strong> <% include Characters %><% end_if %></span>
                    <span class="label">Published:</span> $Added.format(m/d/Y)<br />
                    <% include FanfictionLast %><br />
                    <% include ChildCount %><br />
                    <span class="label">Status:</span> $StoryStatus
                </p>
            </div>
            <% end_if %>
        <% end_if %>
    <% end_control %>
    </div>
<% end_if %>
<h2>Most Recent</h2>

<% cached %>
<% control ChildrenOf(fanfiction) %>
	<h3><a href="$Link" class="$LinkingMode">$Title</a></h3>
    <% control Children %>
        <% control Children  %>
    		<% if Last %>
                <% control Parent %>
                	<!--<a href='<% if Type == "One-shot" %><% include FanfictionRedirect %><% else %>$Link<% end_if %>' class="$LinkingMode">$MenuTitle</a><br />-->
                    <% include StoryOverview %>
                <% end_control %>
        	<% end_if %>
        <% end_control %>
    <% end_control %>
<% end_control %>
<% end_cached %>
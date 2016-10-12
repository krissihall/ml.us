<% if Genres %>
    <% control Genres %>
        <% if Last %>
            $Name
        <% else %>
            $Name, 
        <% end_if %>
    <% end_control %>
<% else %>
	General
<% end_if %>
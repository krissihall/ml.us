<% if Characters %>
    <% control Characters %>
        <% if Last %>
            $Name
        <% else %>
            $Name, 
        <% end_if %>
    <% end_control %>
<% end_if %>
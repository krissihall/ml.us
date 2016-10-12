<% if CoverImage %>
$Link
<% else %>
	<% if Children %>
    	<% control Children %>
        	<% if First %>
            	$Link
            <% end_if %>
        <% end_control %>
    <% else %>
    	$Link
    <% end_if %>
<% end_if %>
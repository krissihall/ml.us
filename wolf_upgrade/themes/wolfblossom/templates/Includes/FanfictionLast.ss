<% if Type == "One-shot" %>

<% else %>
    <% if Children %>
        <span class="label">Updated:</span> 
        <% control Children %>
        	<% if Last %>
                $Added.format(m/d/Y)
            <% end_if %>
        <% end_control %>
    <% else %>
    	
    <% end_if %>
<% end_if %>
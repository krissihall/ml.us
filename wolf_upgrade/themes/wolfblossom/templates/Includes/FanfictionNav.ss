<div class="ffSelect">
	<% if Siblings.count != 0 %>
	<form action="#">
        <select class="newLocation">
        <% control Siblings %>
            <option value="$Link">$Title<% if ChapterTitle != "" %> &ndash; $ChapterTitle<% end_if %></option>
        <% end_control %>
        </select>
    </form>
    <% end_if %>
</div>
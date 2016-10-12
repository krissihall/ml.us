<div class="pagination">
<% if previousPager %>
	<a href="$previousPager.Link" class="prev">&laquo; $previousPager.Title</a>
<% end_if %>

<% if nextPager %>
	<a href="$nextPager.Link" class="next">$nextPager.Title &raquo;</a>
<% end_if %>
<div class="clear"></div>
</div>
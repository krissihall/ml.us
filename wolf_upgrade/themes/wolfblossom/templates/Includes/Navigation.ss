<% cached 'navigation', List(Page).max(LastEdited) %>
<ul id="navi">
	<% control Menu(1) %>
		<li class="$LinkingMode"><a href="$Link" title="$Title">$MenuTitle</a>
		<% if Children %>
		<ul>
			<% control Children %>
				<li class="$LinkingMode"><a href="$Link" title="$Title">$MenuTitle</a>
				<% if Children %>
					<ul>
						<% control Children %>
							<li class="$LinkingMode"><a href="$Link" title="$Title">$MenuTitle</a>
								<% if Children %>
									<ul>
										<% control Children %>
											<li class="$LinkingMode"><a href="$Link" title="$Title">$MenuTitle</a></li>
										<% end_control %>
									</ul>
								<% end_if %>
							</li>
						<% end_control %>
					</ul>
				<% end_if %>
				</li>
			<% end_control %>
		</ul>
		<% end_if %>
	</li>
	<% end_control %>
</ul>
<div class="clear"></div>
<% end_cached %>
<?php

class GenreAdmin_ModelAdmin extends ModelAdmin {
	public static $managed_models = array('Genre'); // Can manage multiple models
	static $url_segment = 'genres'; // Linked as /admin/products/
	static $menu_title = 'Story Genres';
}

class CharacterAdmin_ModelAdmin extends ModelAdmin {
	public static $managed_models = array('Character'); // Can manage multiple models
	static $url_segment = 'characters'; // Linked as /admin/products/
	static $menu_title = 'Story Characters';
}
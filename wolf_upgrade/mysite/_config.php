<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'mystica',
	"password" => '92eB5C4!7',
	"database" => 'mystica_wolfupgrade',
//	"username" => 'root',
//	"password" => '',
//	"database" => 'mystica_ss_wolfproduction',
	"path" => '',
);

MySQLDatabase::set_connection_charset('utf8');

// Set the current theme. More themes can be downloaded from
// http://www.silverstripe.org/themes/
SSViewer::set_theme('simple');

// Set the site locale
i18n::set_locale('en_US');

// Enable nested URLs for this site (e.g. page/sub-page/)
if (class_exists('SiteTree')) SiteTree::enable_nested_urls();

Commenting::add('SiteTree');

RecaptchaField::$public_api_key = '6LdOiN4SAAAAADNKnm6fGLbXsZfZFrWg4JvQN2mS';
RecaptchaField::$private_api_key = '6LdOiN4SAAAAAAHKLTGHsOOust49ADMbHkTXIZ1k';
SpamProtectorManager::set_spam_protector('RecaptchaProtector');
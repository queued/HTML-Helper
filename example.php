<?php
include_once(dirname(__FILE__) . '/core/class.html.php');

echo HTML::Doctype();

$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );

echo HTML::Form('index.php', $fields);
?>

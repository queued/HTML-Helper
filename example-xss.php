<?php
include_once(dirname(__FILE__) . '/class.html.php');

if (isset($_GET['q']) && !empty($_GET['q'])) {
	$query = $_GET['q'];

	echo HTML::Filter_XSS('Your search for <b>%query</b> returned <b>!num</b> results', array('%query' => $query, '!num' => 6));
}

echo HTML::Doctype();

$fields = array(
				'text' => array('id' => 'q', 'name' => 'q', 'placeholder' => 'Looking for something?'),
				'submit' => array('id' => 'submit', 'value' => 'submit')
			   );

echo HTML::Form('index.php', $fields, null, 'get');
?>

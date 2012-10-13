<?php
/**
 * @abstract
 * @author 	Miranda <miranda@lunnaly.com>
 * @version 	1.0.6
 * @link 	https://github.com/over9k/HTML-Helper
 * @license 	http://labs.lunnaly.com/licenses/github/ GitHub Open Source 1.0
 * @package 	HTML-Helper
 */
abstract class HTML {
	/**
	 * $tag Tell what is the current open tag for close it later.
	 *
	 * @static
	 * @access private
	 * @var string What is the current open tag?
	 */
	private static $tag = '';

	/**
	 * What is the current class version?
	 *
	 * @const string The current script version
	 */
	const VERSION = '1.0.6';

	/**
	* ONLY FOR THIS CLASS (self)
	* self::parse_attr($attributes) -> Parse out the attributes
	*
	* @static
	* @access	private
	* @param	mixed - An array or string for parse the specified attributes
	* @return	string The parsed attribute (attribute="value")
	*/
	private static function parse_attr($attributes) {
		if (is_string($attributes)) {
			return (!empty($attributes)) ? ' ' . trim($attributes) : '';
		}

		if (is_array($attributes)) {
			$attr = '';

			foreach ($attributes as $key => $val) {
				$attr .= ' ' . $key . '="' . $val . '"';
			}

			return $attr;
		}
	}

	/**
	 * ONLY FOR THIS CLASS (self)
	 * HTML::parse_fields($fields) -> Parse the $fields array and transform into a valid HTML input
	 *
	 * @static
	 * @access private
	 * @param  array $fields An array with the following structure -> 'Type' => array($attributes)
	 * @return string The parsed input HTML
	 */
	private static function parse_fields($fields) {
		if (is_array($fields)) {
			$field = '';

			foreach ($fields as $key => $val) {
				$attributes = self::parse_attr($val);

				$field .= '<input type="' . $key .'"' . $attributes . ' />' . PHP_EOL;
			}

			return $field;
		}
	}

	/**
	 * ONLY FOR THIS CLASS (self)
	 * self::list_item($items) -> Returns a <li></li> tag parsed with the value in the array ($items = array)
	 *
	 * @static
	 * @access private
	 * @param  array $items The array with a list to transform into a <li></li> tag
	 * @param  string $class A class for the items
	 * @return string The complete <li></li> tag
	 */
	private static function list_item($items, $class = null) {
		if (is_array($items)) {
			$class = (isset($class) && !empty($class)) ? ' class="' . $class . '"': null;
			$li = '';
			$i = 0;

			foreach ($items as $key => $val) {
				$i++;
				$li .= '<li id="' . $i . '"' . $class . '>' . PHP_EOL . $val . PHP_EOL . '</li>' . PHP_EOL;
			}

			return $li;
		}
	}

	/**
	 * ONLY FOR THIS CLASS (self)
	 * self::filter description
	 *
	 * @static
	 * @access 	private
	 * @param  	string $str The input string to filter
	 * @param  	string $mode The filter mode
	 * @return 	mixed May return the filtered string or may return null if the $mode variable isn't set
	 */
	private static function filter($str, $mode) {
		switch($mode) {
			case 'strip':
				/* HTML tags are stripped from the string
				before it is used. */
				return strip_tags($str);
			case 'escapeAll':
				/* HTML and special characters are escaped from the string
				before it is used. */
				return htmlentities($str, ENT_QUOTES, 'UTF-8');
			case 'escape':
				/* Only HTML tags are escaped from the string. Special characters
				is kept as is. */
				return htmlspecialchars($str, ENT_NOQUOTES, 'UTF-8');
			case 'url':
				/* Encode a string according to RFC 3986 for use in a URL. */
				return rawurlencode($str);
			case 'filename':
				/* Escape a string so it's safe to be used as filename. */
				return str_replace('/', '-', $str);
			default:
				return null;
		}
	}

	/**
	 * Generates a HTML document type
	 *
	 * @static
	 * @access 	public
	 * @param 	string $type Type of the document
	 * @return 	string
	 */
	public static function Doctype($type = 'html5') {
		$doctypes = array(
			'html5'			=> '<!DOCTYPE html>',
			'xhtml11'		=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
			'xhtml1-strict'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
			'xhtml1-trans'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
			'xhtml1-frame'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
			'html4-strict'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
			'html4-trans'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
			'html4-frame'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">',
		);

		if (isset($doctypes[strtolower($type)])) {
			return $doctypes[$type] . "\n";
		}
		else {
			return '';
		}
	}

	/**
	 * Creates the <img /> tag
	 *
	 * @static
	 * @access 	public
	 * @param 	string $src Where is the image?
	 * @param 	mixed $attributes Custom attributes (must be a valid attribute for the <img /> tag)
	 * @return 	string The formated <img /> tag
	 */
	public static function Image($src, $attributes = '') {
		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}

		return '<img src="' . $src . '"' . $attributes . ' border="0" />';
	}

	/**
	 * Creates a HTML Anchor link
	 *
	 * @static
	 * @access 	public
	 * @param 	string $url the URL
	 * @param 	string $label the link value
	 * @param 	mixed $attributes Custom attributes (must be a valid attribute for the <a></a> tag)
	 * @return 	string The formated <a></a> tag
	 */
	public static function Anchor($url, $label = null, $attributes = null) {
		$label = (!empty($label)) ? $label : $url;

		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}

		return '<a href="' . $uri . '"' . $attributes . '>' . $label . '</a>';
	}

	/**
	 * Generates a "mailto" link
	 *
	 * @static
	 * @access 	public
	 * @param 	$email
	 * @param 	string $label The anchor value.
	 * @param 	mixed $attributes Custom attributes (must be a valid attribute for the <a></a> tag)
	 * @return 	string The formated <a></a> tag with the 'href' attribute set for: mailto:$email
	 */
	public static function Email($email, $label = null, $attributes = null)	{
		$label = (!empty($label)) ? $label : $email;

		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}

		$html = '<a href="mailto:' . $email . '"' . $attributes . '>' . $label . '</a>';
		return $html;
	}

	/**
	 * HTML <br /> tag
	 *
	 * @static
	 * @access 	public
	 * @param 	int $count How many line breaks?
	 * @return 	string
	 */
	public static function LineBreak($count = 1) {
		return str_repeat('<br />', $count) . PHP_EOL;
	}

	/**
	 * Returns non-breaking space entities
	 *
	 * @static
	 * @access 	public
	 * @param 	int $count How many spaces?
	 * @return 	string
	 */
	public static function Space($count = 1) {
		return str_repeat('&nbsp;', $count);
	}

	/**
	 * HTML::Form() -> Creates the <form> tag with the specified variables.
	 *
	 * @static
	 * @access 	public
	 * @param 	string $action The action attribute value.
	 * @param 	array $fields What is the form fields?
	 * @param 	string $name The form name
	 * @param 	string $method The form method (post or get)
	 * @param 	string $enctype The form enctype
	 */
	public static function Form($action, $fields, $name = null, $method = 'post', $enctype = 'multipart/form-data') {
		$name = (isset($name) && !empty($name)) ? ' name="' . $name . '"' : null;
		$method = (isset($method)) ? ' method="' . $method . '"': null;
		$enctype = (isset($enctype)) ? ' enctype="' . $enctype . '"': null;
		$html = '<form action="' . $action . '"' . $name . $method . $enctype . '>' . PHP_EOL;
		$html .= self::parse_fields($fields);
		$html .= '</form>' . PHP_EOL;

		return $html;
	}

	/**
	 * HTML::Open('tag') -> Opens a HTML tag
	 *
	 * @static
	 * @access 	private
	 * @param 	string $tag Which tag we're gonna open?
	 * @param 	mixed $attributes Custom attributes (must be a valid attribute for the specified tag)
	 * @param 	array $li_items Some array with items for <ul> or <ol> tags
	 * @return 	string Return the opened tag (<$tag>)
	 */
	public static function Open($tag, $attributes = null, $li_items = array()) {
		self::$tag = strtolower($tag);

		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}

		if ($tag == 'ul' || $tag == 'ol') {
			if (!empty($attributes['li_class'])) {
				$list = self::list_item($li_items, $attributes['li_class']);
				return '<' . self::$tag . $attributes . '>' . PHP_EOL . $li_items;
			} else {
				$list = self::list_item($li_items);
				return '<' . self::$tag . $attributes . '>' . PHP_EOL . $li_items;
			}
		}

		return '<' . self::$tag . $attributes . '>' . PHP_EOL;
	}

	/**
	 * HTML::Close() -> Close the current open tag
	 *
	 * @static
	 * @access 	public
	 */
	public static function Close() {
		return PHP_EOL . '</' . self::$tag . '>' . PHP_EOL;
	}

	/**
	 * HTML::Filter_XSS($str, $args) -> Filter some string with the params into $args
	 *
	 * @static
	 * @access 	public
	 * @param 	string $str String to clean the possible XSS attack.
	 * @param 	array $args The array with the parameters
	 * @return 	string The safe string.
	 */
	public static function Filter_XSS($str, $args) {
		/* Loop trough the args and apply the filters. */
		while(list($name, $data) = each($args)) {
			$safe = false;
			$type = mb_substr($name, 0, 1);
			switch($type) {
				case '%':
					/* %variables: HTML tags are stripped of from the string
					before it's inserted. */
					$safe = self::filter($data, 'strip');
					break;
				case '!':
					/* !variables: HTML and special characters are escaped from the string
					before it is used. */
					$safe = self::filter($data, 'escapeAll');
					break;
				case '@':
					/* @variables: Only HTML is escaped from the string. Special characters
					is kept as it is. */
					$safe = self::filter($data, 'escape');
					break;
				case '&':
					/* Encode a string according to RFC 3986 for use in a URL. */
					$safe = self::filter($data, 'url');
					break;
				default:
					return null;
					break;
			}

			if ($safe !== false) {
				$str = str_replace($name, $safe, $str);
			}
		}

		return $str;
	}

	/**
	 * HTML::Version() -> Return the script version
	 *
	 * @static
	 * @access 	public
	 */
	public static function Version() {
		return self::VERSION;
	}
}
?>

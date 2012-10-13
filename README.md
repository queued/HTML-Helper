# Description

 **HTML Helper** is a complete PHP class which provide a really simple markup which will make your HTML rendering easier than ever.

----------

# Feedback
 Feel free to contact me via [Email](mailto:miranda@lunnaly.com) anytime you want. If you like this class and use it in somewhere, please, send me a feedback with your opinion about my job. If you are interested in my job, hire me at [Lunnaly](http://lunnaly.com "Lunnaly's Website"). Fork this repo, I appreciate! =)

----------

# Installing
```php
// Just include the class and you're ready to rock! :)
include_once(dirname(__FILE__) . '/class.html.php');
```

----------

# The $attributes variable
This variable can be a string like this: `'attribute1="value1" attribute2="value2"'`.
Or an array like this: `array('attribute1' => 'value1', 'attribute2' => 'value2');`.
So when you're going to set the `$attributes` variable in some function, always remember the style of code that it must to be.

# Functions
* [HTML::Doctype(string $type);](#doctype)
* [HTML::Image(string $src, mixed $attributes);](#image)
* [HTML::Anchor(string $url, string $label, mixed $attributes);](#anchor)
* [HTML::Email(string $email, string $label);](#email)
* [HTML::LineBreak(integer $count);](#linebreak)
* [HTML::Space(integer $count);](#space)
* [HTML::Form(string $action, array $fields, string $name, string $method, string $enctype);](#form)
* [HTML::Open(string $tag, mixed $attributes, array $li_items);](#openclose)
* [HTML::Close();](#open--close)
* [HTML::Version();](#version)

### Doctype
Return the specified doctype

```php
// The below line will print the default doctype, which is HTML5: <!DOCTYPE html>
echo HTML::Doctype();

// See all the available doctypes below this code section.
```

>#### _Availabe Doctypes_
```
html5			-> HTML5
xhtml11			-> (x)HTML 1.1
xhtml1-strict 	-> (x)HTML 1.0 Strict
xhtml1-trans 	-> (x)HTML 1.0 Transitional
xhtml1-frame 	-> (x)HTML 1.0 Frameset
html4-strict	-> HTML4 Strict
html4-trans		-> HTML4 Transitional
html4-frame		-> HTML4 Frameset
```

### Image
Returns the `<img />` tag

```php
// The below line will print: <img src="http://example.com/location/to/image.png" border="0" />
echo HTML::Image('http://example.com/location/to/image.png');
```

### Anchor
Returns the `<a></a>` with the specified attributes.

```php
// The below line will print: <a href="http://lunnaly.com" target="_blank" title="">Lunnaly</a>
echo HTML::Anchor('http://lunnaly.com', 'Lunnaly', array('target' => '_blank'));
```

### Email
Returns a formated 'mailto' link.

```php
// The below line will print: <a href="mailto:email@site.com">My Email</a>
echo HTML::Email('email@site.com', 'My Email');
```

### Line break
Returns the `<br />` (break) tag.

```php
// The below line will print <br /><br /><br /> (3 times <br />)
echo HTML::LineBreak(3);
```

### Space
Returns the `&nbsp;` (white space) entity .

```php
// The below line will print &nbsp;&nbsp;&nbsp; (3 times &nbsp;)
echo HTML::Space(3);
```

### Form
Create the structure following: `<form>$fields</form>`.

```php
// The below line will print a 'post' form with the following 'action' attribute: 'my-file.php' and 2 fields which are: 'username' and 'password'.
echo HTML::Form('my-file.php', array('text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text field! =)'), 'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input! =)')));
```

> #### _HTML::Form() Usage_
```
echo HTML::Form(the 'action' file, an array with the following structure: type => array(attribute => value));
That's all you need to print a form. =)
```

### Open & Close
Open a tag and pass the specified attributes to the same.

```php
// The below line will print an opened tag
echo HTML::Open('tag', 'attribute="value"');
echo 'My content goes here';
// After you've done inserting the content, you must close the tag.
echo HTML::Close();
```

### Version
Return the script version (major.minor.build)

```php
// Usage
echo HTML::Version();
```
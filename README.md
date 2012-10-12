# Description

 **HTML Helper** is a complete PHP class which provide an awesome markup which will make your HTML rendering easier than ever.

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

# Functions
* [HTML::Doctype();](#doctype)
* [HTML::Image();](#image)
* [HTML::Anchor();](#anchor)
* [HTML::Email();](#email)
* [HTML::LineBreak();](#linebreak)
* [HTML::Space();](#space)
* [HTML::Form();](#form)
* [HTML::Open();](#open)
* [HTML::Close();](#open)
* [HTML::Filter_XSS();](#xss)
* [HTML::Version();](#version)

#### Doctype

```php
// Prints the specified doctype.
// -------------------------------------
// This below line will print the default doctype, which is HTML5 (<!DOCTYPE html>)
echo HTML::Doctype();

// See all the available doctypes for input below this code section.
```

##### _Availabe Doctypes_
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
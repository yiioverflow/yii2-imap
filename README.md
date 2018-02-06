yii2 Imap
==========
This library can be used to read mails from IMAP server using PHP and Yii2.

Installation by composer
------------
```composer
{
    "require": {
       "roopz/yii2-imap": "dev-master"
    }
}

Or

$ composer require roopz/yii2-imap "dev-master"
```

# Documentation
[Documentation, Usage and Demo](http://yiioverflow.com/yii2-imap/)

### Config example

```php
'imap' => [
	'class' => '',
	'connection' => [
		'imapPath' => '',
		'imapLogin' => '',
		'imapPassword' => '',
		'serverEncoding' => 'utf-8',
		'attachmentsDir' => '/tmp',
		'decodeMimeStr' => false
	]
]
```

# Donate
[Send me a beer] (https://donorbox.org/yii2-imap)

# Contribute
Feel free to contribute. If you have ideas for examples, add them to the repo and send in a pull request.

# Apreciate
Dont forgett o Leave me a "star" if you like it. Enjoy coding!

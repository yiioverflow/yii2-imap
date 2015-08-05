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
Usage
-----
```php
use roopz/Imap;

$mailbox = new Imap;

//4th Param _DIR_ is the location to save attached files Eg: /path/to/application/mail/uploads.
$mailbox->connect('{imap.gmail.com:993/imap/ssl}INBOX', 'yiioverflow@gmail.com', 'password', __DIR__);
```
To get all mails and its index
----------------
```php
$mailIds = $mailbox->searchMailBox('ALL');

// Prints all Mail ids.
print_r($mailIds) 
```
To read Inbox contents
----------------
```php

foreach($mailIds as $mailId)
{
    // Returns Mail contents
    $mail = $mailbox->getMail($mailId); 
    
    // Returns mail attachements if any or else empty array
    $attachment = $mail->getAttachments(); 

}
```
To Mark and delete mail from IMAP server.
----------------
```php
//Mark a mail to delete
$mailbox->deleteMail($mailId); 

// Deletes all marked mails
$mailbox->expungeDeletedMails(); 
```

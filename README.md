yii2 Imap
==========
This library can be used to read mails from IMAP server using PHP and Yii2.

Installation by composer
------------
```composer
{
    "require": {
       "roopz/yii2-imap": "*"
    }
}

Or

$ composer require "roopz/yii2-imap": "*"
```
Usage
-----
```php
use roopz/Imap;

$mailbox = new Imap;
$mailbox->connect('{imap.gmail.com:993/imap/ssl}INBOX', 'yiioverflow@gmail.com', 'password', __DIR__);
```
To get all mails
----------------
```php
$mailIds = $mailbox->searchMailBox('ALL');

  if(!$mailIds) {
    return [];
  }
 
$mailId = reset($mailIds);

foreach($mailIds as $mailId)
{
    $mail = $mailbox->getMail($mailId); // To get the each mails
    $attachment = $mail->getAttachments(); // To get attachments
    $mailbox->deleteMail($mailId); //To mark mail for delete
}

$mailbox->expungeDeletedMails(); // To delete marked mails
```

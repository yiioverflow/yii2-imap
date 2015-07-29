<?php

namespace roopz\Imap;

/* 
 * 
 * Copyright (c) 2015 by Roopan Valiya Veetil <yiioverflow@gmail.com>.
 * All rights reserved.
 * Date : 29-07-2015
 * Time : 5:20 PM
 * Class can be used for connecting and extracting Email messages.
 * 
 */

class Imap extends roopz\Imap\Mailbox
{
    public function connect($imapPath, $login, $password, $attachmentsDir = null, $serverEncoding = 'UTF-8')
    {
        $this->imapPath = $imapPath;
        $this->imapLogin = $login;
        $this->imapPassword = $password;
        $this->serverEncoding = strtoupper($serverEncoding);
        if($attachmentsDir) {
                if(!is_dir($attachmentsDir)) {
                        throw new Exception('Directory "' . $attachmentsDir . '" not found');
                }
                $this->attachmentsDir = rtrim(realpath($attachmentsDir), '\\/');
        }
    }
}

<?php
/**
 *Copyright (c) 2012 by Barbushin Sergey <barbushin@gmail.com>.
 *All rights reserved.
 */

namespace roopz\imap;

/**
 * Class IncomingMail
 * @package roopz\imap
 */
class IncomingMail
{
	public $id;
	public $date;
	public $subject;

	public $fromName;
	public $fromAddress;

	public $to = array();
	public $toString;
	public $cc = array();
	public $replyTo = array();

	public $textPlain;
	public $textHtml;
	/** @var IncomingMailAttachment[] */
	protected $attachments = array();

	/**
	 * @param \roopz\imap\IncomingMailAttachment $attachment
	 */
	public function addAttachment(IncomingMailAttachment $attachment)
	{
		$this->attachments[$attachment->id] = $attachment;
	}

	/**
	 * @return IncomingMailAttachment[]
	 */
	public function getAttachments()
	{
		return $this->attachments;
	}

	/**
	 * Get array of internal HTML links placeholders
	 * @return array attachmentId => link placeholder
	 */
	public function getInternalLinksPlaceholders()
	{
		return preg_match_all('/=["\'](ci?d:([\w\.%*@-]+))["\']/i', $this->textHtml, $matches) ? array_combine($matches[2], $matches[1]) : array();
	}

	/**
	 * @param $baseUri
	 * @return mixed
	 */
	public function replaceInternalLinks($baseUri)
	{
		$baseUri = rtrim($baseUri, '\\/') . '/';
		$fetchedHtml = $this->textHtml;

		foreach ($this->getInternalLinksPlaceholders() as $attachmentId => $placeholder) {
			if (isset($this->attachments[$attachmentId])) {
				$fetchedHtml = str_replace($placeholder, $baseUri.basename($this->attachments[$attachmentId]->filePath), $fetchedHtml);
			}
		}

		return $fetchedHtml;
	}
}

/**
 * Class IncomingMailAttachment
 * @package roopz\imap
 */
class IncomingMailAttachment
{
	public $id;
	public $name;
	public $filePath;
}

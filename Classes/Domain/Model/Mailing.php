<?php

namespace WapplerSystems\Cleverreach\Domain\Model;


/**
 * This file is part of the "cleverreach" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */


class Mailing
{

    /**
     * @var string
     */
    protected $name = 'my internal name';

    /**
     * @var string
     */
    protected $type = 'html/text';

    /**
     * @var string
     */
    protected $subject = 'subject line';

    /**
     * @var string
     */
    protected $senderName = 'Bruce Wayne (Wayne corp.)';

    /**
     * @var string
     */
    protected $senderEmail = 'bruce.wayne@gotham.com';

    /**
     * @var integer
     */
    protected $groupId = 0;

    /**
     * @var string
     */
    protected $html = 'Newsletter Content';

    /**
     * @var string
     */
    protected $text = 'this is the Text only';

    /**
     * Mailing constructor.
     * 
     * @param $name
     * @param $subject
     * @param $group
     * @param null $content
     */
    public function __construct($name, $type, $subject, $html, $text)
    {
        $this->name = $name;
        $this->type = $type;
        $this->subject = $subject;
        $this->html = $html;
        $this->text = $text;
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'subject' => $this->subject,
            'sender_name' => $this->senderName,
            'sender_email' => $this->senderEmail,
            'html' => $this->html,
            'text' => $this->text
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getSenderName(): string
    {
        return $this->senderName;
    }

    /**
     * @param string $senderName
     */
    public function setSenderName(string $senderName)
    {
        $this->senderName = $senderName;
    }

    /**
     * @return string
     */
    public function getSenderEmail(): string
    {
        return $this->senderEmail;
    }

    /**
     * @param string $senderEmail
     */
    public function setSenderEmail(string $senderEmail)
    {
        $this->senderEmail = $senderEmail;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml(string $html)
    {
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

}
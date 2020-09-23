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
     * @var array
     */
    protected $content = [];

    /**
     * @var array
     */
    protected $recievers = [];

    /**
     * @var array
     */
    protected $settings = [];
    
    /**
     * Mailing constructor.
     * @param string $email
     * @param array $attributes
     */
    public function __construct($name, $subject, $group, $content = NULL)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->recievers['groups'] = [$group];
        $this->content = $content;
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'subject' => $this->subject,
            'sender_name' => $this->senderName,
            'sender_email' => $this->senderEmail,
            'content' => $this->content,
            'receivers' => $this->recievers,
            'settings' => $this->settings,
        ];
    }


    /**
     * @param \stdClass $obj
     * @return Receiver
     */
    public static function createInstance($obj): Mailing
    {
        $inst = new self($obj->name);
        $inst->subject = $obj->subject;
        $inst->content = (array)$obj->content;
        return $inst;
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
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param array $content
     */
    public function setContent(array $content)
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getRecievers(): array
    {
        return $this->recievers;
    }

    /**
     * @param array $recievers
     */
    public function setRecievers(array $recievers)
    {
        $this->recievers = $recievers;
    }    
    
    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @param array $settings
     */
    public function setSettings(array $settings)
    {
        $this->settings = $settings;
    }

}
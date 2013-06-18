<?php
namespace afoozle\GithubWebhook\Payload;


class Commit
{
    /**
     * @var string[]
     */
    private $added = array();

    /**
     * @var null
     */
    private $author = null;

    /**
     * @var null
     */
    private $committer = null;

    /**
     * @var bool
     */
    private $distinct = false;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $message = null;

    /**
     * @var string[]
     */
    private $modified = array();

    /**
     * @var string[]
     */
    private $removed = array();

    /**
     * @var \DateTime
     */
    private $timestamp = null;

    /**
     * @var string
     */
    private $url = null;


    public function setAdded($added)
    {
        $this->added = $added;
    }

    public function getAdded()
    {
        return $this->added;
    }

    /**
     * @param null $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @todo Fixme, use real data type
     * @return null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @todo Fixme, use real data type
     * @param $committer
     */
    public function setCommitter($committer)
    {
        $this->committer = $committer;
    }

    /**
     * @return null
     */
    public function getCommitter()
    {
        return $this->committer;
    }

    /**
     * @param bool $distinct
     */
    public function setIsDistinct($distinct)
    {
        $this->distinct = $distinct;
    }

    /**
     * @return bool
     */
    public function isDistinct()
    {
        return $this->distinct;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string[] $modified
     */
    public function setModified(array $modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return string[]
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param string[] $removed
     */
    public function setRemoved(array $removed)
    {
        $this->removed = $removed;
    }

    /**
     * @return string[]
     */
    public function getRemoved()
    {
        return $this->removed;
    }

    /**
     * @param \DateTime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

}
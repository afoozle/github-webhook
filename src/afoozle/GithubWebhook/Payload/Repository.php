<?php
namespace afoozle\GithubWebhook\Payload;

class Repository {

    /**
     * @var \DateTime
     */
    private $createdAt = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var bool
     */
    private $isFork = false;

    /**
     * @var int
     */
    private $forks = null;

    /**
     * @var bool
     */
    private $hasDownloads = false;

    /**
     * @var bool
     */
    private $hasIssues = false;

    /**
     * @var bool
     */
    private $hasWiki = false;

    /**
     * @var string
     */
    private $homepage = null;

    /**
     * @var int
     */
    private $id = null;

    /**
     * @var string
     */
    private $language = null;

    /**
     * @var string
     */
    private $masterBranch = null;

    /**
     * @var string
     */
    private $name = null;

    /**
     * @var int
     */
    private $openIssues = null;

    /**
     * @var bool
     */
    private $isPrivate = false;

    /**
     * @var \DateTime
     */
    private $pushedAt = null;

    /**
     * @var int
     */
    private $size = null;

    /**
     * @var int
     */
    private $stargazers = null;

    /**
     * @var string
     */
    private $url = null;

    /**
     * @var int
     */
    private $watchers = null;

    /**
     * @var null
     */
    private $owner = null;

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $forks
     */
    public function setForks($forks)
    {
        $this->forks = $forks;
    }

    /**
     * @param boolean $hasDownloads
     */
    public function setHasDownloads($hasDownloads)
    {
        $this->hasDownloads = $hasDownloads;
    }

    /**
     * @param boolean $hasIssues
     */
    public function setHasIssues($hasIssues)
    {
        $this->hasIssues = $hasIssues;
    }

    /**
     * @param boolean $hasWiki
     */
    public function setHasWiki($hasWiki)
    {
        $this->hasWiki = $hasWiki;
    }

    /**
     * @param string $homepage
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param boolean $isFork
     */
    public function setIsFork($isFork)
    {
        $this->isFork = $isFork;
    }

    /**
     * @param boolean $isPrivate
     */
    public function setIsPrivate($isPrivate)
    {
        $this->isPrivate = $isPrivate;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @param string $masterBranch
     */
    public function setMasterBranch($masterBranch)
    {
        $this->masterBranch = $masterBranch;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param int $openIssues
     */
    public function setOpenIssues($openIssues)
    {
        $this->openIssues = $openIssues;
    }

    /**
     * @param \DateTime $pushedAt
     */
    public function setPushedAt($pushedAt)
    {
        $this->pushedAt = $pushedAt;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @param int $stargazers
     */
    public function setStargazers($stargazers)
    {
        $this->stargazers = $stargazers;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isFork()
    {
        return $this->isFork;
    }

    /**
     * @return int
     */
    public function getForks()
    {
        return $this->forks;
    }

    /**
     * @return bool
     */
    public function hasDownloads()
    {
        return $this->hasDownloads;
    }

    /**
     * @return bool
     */
    public function hasIssues()
    {
        return $this->hasIssues;
    }

    /**
     * @return bool
     */
    public function hasWiki()
    {
        return $this->hasWiki;
    }

    /**
     * @return string
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getMasterBranch()
    {
        return $this->masterBranch;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getOpenIssues()
    {
        return $this->openIssues;
    }

    /**
     * @return bool
     */
    public function isPrivate()
    {
        return $this->isPrivate;
    }

    /**
     * @return \DateTime
     */
    public function getPushedAt()
    {
        return $this->pushedAt;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getStargazers()
    {
        return $this->stargazers;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param int $watchers
     */
    public function setWatchers($watchers)
    {
        $this->watchers = $watchers;
    }

    /**
     * @return int
     */
    public function getWatchers()
    {
        return $this->watchers;
    }

    /**
     * @param Person $owner
     */
    public function setOwner(Person $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return Person
     */
    public function getOwner()
    {
        return $this->owner;
    }

}
<?php
/**
 * Entity class representing a Webhook Payload
 *
 * Copyright (c) Matthew Wheeler <matt@yurisko.net>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 *
 * @author     Matthew Wheeler <matt@yurisko.net>
 * @license    MIT
 */
namespace afoozle\GithubWebhook\Payload;

/**
 * Class Payload
 * @package afoozle\GithubWebhook\Payload
 */
class Payload {

    /**
     * @var string git SHA hash
     */
    private $after = null;

    /**
     * @var string git SHA hash
     */
    private $before = null;

    /**
     * @var Commit[]
     */
    private $commits = null;

    /**
     * @var string Comparison URL
     */
    private $compare = null;

    /**
     * @var bool
     */
    private $created = false;

    /**
     * @var bool
     */
    private $deleted = false;

    /**
     * @var bool
     */
    private $forced;

    /**
     * @var Commit
     */
    private $headCommit;

    /**
     * @var Person
     */
    private $pusher;

    /**
     * @var string
     */
    private $ref;

    /**
     * @var Repository
     */
    private $repository;

    /**
     * @param string $after
     */
    public function setAfter($after)
    {
        $this->after = $after;
    }

    /**
     * @return string
     */
    public function getAfter()
    {
        return $this->after;
    }

    /**
     * @param string $before
     */
    public function setBefore($before)
    {
        $this->before = $before;
    }

    /**
     * @return string
     */
    public function getBefore()
    {
        return $this->before;
    }

    /**
     * @param Commit[] $commits
     */
    public function setCommits(array $commits)
    {
        $this->commits = $commits;
    }

    /**
     * @return Commit[]
     */
    public function getCommits()
    {
        return $this->commits;
    }

    /**
     * @param string $compare
     */
    public function setCompare($compare)
    {
        $this->compare = $compare;
    }

    /**
     * @return string
     */
    public function getCompare()
    {
        return $this->compare;
    }

    /**
     * @param boolean $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return boolean
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param boolean $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param boolean $forced
     */
    public function setForced($forced)
    {
        $this->forced = $forced;
    }

    /**
     * @return boolean
     */
    public function getForced()
    {
        return $this->forced;
    }

    /**
     * @param Commit $headCommit
     */
    public function setHeadCommit(Commit $headCommit)
    {
        $this->headCommit = $headCommit;
    }

    /**
     * @return Commit
     */
    public function getHeadCommit()
    {
        return $this->headCommit;
    }

    /**
     * @param Person $pusher
     */
    public function setPusher(Person $pusher)
    {
        $this->pusher = $pusher;
    }

    /**
     * @return Person
     */
    public function getPusher()
    {
        return $this->pusher;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->repository;
    }

}
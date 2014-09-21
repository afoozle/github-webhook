<?php
/**
 * Tests for CommitMapper
 *
 * Copyright (c) Matthew Wheeler <matt@yurisko.net>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 *
 * @author     Matthew Wheeler <matt@yurisko.net>
 * @license    MIT
 */
namespace afoozle\GithubWebhook\EntityMapper;

use afoozle\GithubWebhook\Entity\Commit;

class CommitMapperTest extends \PHPUnit_Framework_TestCase {

    private function getTestJson()
    {
        $testJson = <<<ENDJSON
{
    "added":[
        "words/madame-bovary.txt",
        "words/funkatron.md"
    ],
    "author":{
        "email":"lolwut@noway.biz",
        "name":"Garen Torikian",
        "username":"octoauthor"
    },
    "committer":{
        "email":"lolwut@noway.biz",
        "name":"Garen Torikian",
        "username":"octocommitter"
    },
    "distinct":true,
    "id":"1481a2de7b2a7d02428ad93446ab166be7793fbb",
    "message":"Rename madame-bovary.txt to words/madame-bovary.txt",
    "modified":[
        "madame-bovary.txt"
    ],
    "removed":[
       "madame-bovary.txt"
    ],
    "timestamp":"2013-03-12T08:14:29-07:00",
    "url":"https://github.com/octokitty/testing/commit/1481a2de7b2a7d02428ad93446ab166be7793fbb"
}
ENDJSON;
        return $testJson;
    }

    private function getAndMapEntity()
    {
        $mapper = new CommitMapper();
        $commitObject = $mapper->mapFromJson($this->getTestJson());
        return $commitObject;
    }

    public function testMapWithInvalidJson()
    {
        $mapper = new CommitMapper();

        try {
            $mapper->mapFromJson('this is not json');
            $this->fail("An expected InvalidArgumentException was not thrown");
        }
        catch (\InvalidArgumentException $expected){
            return;
        }
    }

    public function testMapAdded()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertEquals(
            array("words/madame-bovary.txt","words/funkatron.md"),
            $dataObject->getAdded(),
            "Added mapped incorrectly"
        );
    }

    public function testMapAuthor()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertInstanceOf('\\afoozle\\GithubWebhook\Entity\Person', $dataObject->getAuthor(), "Author not mapped correctly");
        $this->assertEquals('octoauthor', $dataObject->getAuthor()->getUsername(), "Author not mapped correctly");
    }

    public function testMapCommitter()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertInstanceOf('\\afoozle\\GithubWebhook\Entity\Person', $dataObject->getCommitter(), "Committer not mapped correctly");
        $this->assertEquals('octocommitter', $dataObject->getCommitter()->getUsername(), "Committer not mapped correctly");
    }

    public function testMapDistinct()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertEquals(true, $dataObject->isDistinct(), "Distinct mapped incorrectly");
    }

    public function testMapId()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertEquals("1481a2de7b2a7d02428ad93446ab166be7793fbb", $dataObject->getId(), "Id mapped incorrectly");
    }

    public function testMapMessage()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertEquals("Rename madame-bovary.txt to words/madame-bovary.txt", $dataObject->getMessage(), "Message mapped incorrectly");
    }

    public function testMapModified()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertEquals(array(), $dataObject->getModified(), "Modified mapped incorrectly");
    }

    public function testMapRemoved()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertEquals(array("madame-bovary.txt"), $dataObject->getRemoved(), "Removed mapped incorrectly");
    }

    public function testMapTimestamp()
    {
        $dataObject = $this->getAndMapEntity();
        $expectedTimestamp = new \DateTime("2013-03-12T08:14:29-07:00");
        $this->assertEquals($expectedTimestamp, $dataObject->getTimestamp(), "Timestamp mapped incorrectly");
    }

    public function testMapUrl()
    {
        $dataObject = $this->getAndMapEntity();
        $this->assertEquals(
            "https://github.com/octokitty/testing/commit/1481a2de7b2a7d02428ad93446ab166be7793fbb",
            $dataObject->getUrl(),
            "Url mapped incorrectly"
        );
    }
}

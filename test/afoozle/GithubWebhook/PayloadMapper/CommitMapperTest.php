<?php
namespace afoozle\GithubWebhook\PayloadMapper;

use afoozle\GithubWebhook\Payload\Commit;

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
        "username":"octokitty"
    },
    "committer":{
        "email":"lolwut@noway.biz",
        "name":"Garen Torikian",
        "username":"octokitty"
    },
    "distinct":true,
    "id":"1481a2de7b2a7d02428ad93446ab166be7793fbb",
    "message":"Rename madame-bovary.txt to words/madame-bovary.txt",
    "modified":[
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

    private function getAndMapPayload()
    {
        $commitObject = new Commit();
        $mapper = new CommitMapper($commitObject);
        $mapper->mapFromJson($this->getTestJson());
        return $commitObject;
    }

    public function testMapAdded()
    {
        $dataObject = $this->getAndMapPayload();
        $this->assertEquals(
            array("words/madame-bovary.txt","words/funkatron.md"),
            $dataObject->getAdded(),
            "Added mapped incorrectly"
        );
    }

    public function testMapAuthor()
    {
        $this->markTestSkipped("Author/Person object not written yet");
    }

    public function testMapCommitter()
    {
        $this->markTestSkipped("Author/Person object not written yet");
    }

    public function testMapDistinct()
    {
        $dataObject = $this->getAndMapPayload();
        $this->assertEquals(true, $dataObject->isDistinct(), "Distinct mapped incorrectly");
    }

    public function testMapId()
    {
        $dataObject = $this->getAndMapPayload();
        $this->assertEquals("1481a2de7b2a7d02428ad93446ab166be7793fbb", $dataObject->getId(), "Id mapped incorrectly");
    }

    public function testMapMessage()
    {
        $dataObject = $this->getAndMapPayload();
        $this->assertEquals("Rename madame-bovary.txt to words/madame-bovary.txt", $dataObject->getMessage(), "Message mapped incorrectly");
    }

    public function testMapModified()
    {
        $dataObject = $this->getAndMapPayload();
        $this->assertEquals(array(), $dataObject->getModified(), "Modified mapped incorrectly");
    }

    public function testMapRemoved()
    {
        $dataObject = $this->getAndMapPayload();
        $this->assertEquals(array("madame-bovary.txt"), $dataObject->getRemoved(), "Removed mapped incorrectly");
    }

    public function testMapTimestamp()
    {
        $dataObject = $this->getAndMapPayload();
        $expectedTimestamp = new \DateTime("2013-03-12T08:14:29-07:00");
        $this->assertEquals($expectedTimestamp, $dataObject->getTimestamp(), "Timestamp mapped incorrectly");
    }

    public function testMapUrl()
    {
        $dataObject = $this->getAndMapPayload();
        $this->assertEquals(
            "https://github.com/octokitty/testing/commit/1481a2de7b2a7d02428ad93446ab166be7793fbb",
            $dataObject->getUrl(),
            "Url mapped incorrectly"
        );
    }
}

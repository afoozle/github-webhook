<?php
namespace afoozle\GithubWebhook\PayloadMapper;

use afoozle\GithubWebhook\Payload\Payload;

class PayloadMapperTest extends \PHPUnit_Framework_TestCase {

    private function getTestJson()
    {
        $testData = <<<ENDJSON
{
   "after":"1481a2de7b2a7d02428ad93446ab166be7793fbb",
   "before":"17c497ccc7cca9c2f735aa07e9e3813060ce9a6a",
   "commits":[
      {
         "added":[

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
         "id":"c441029cf673f84c8b7db52d0a5944ee5c52ff89",
         "message":"Test",
         "modified":[
            "README.md"
         ],
         "removed":[

         ],
         "timestamp":"2013-02-22T13:50:07-08:00",
         "url":"https://github.com/octokitty/testing/commit/c441029cf673f84c8b7db52d0a5944ee5c52ff89"
      },
      {
         "added":[

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
         "id":"36c5f2243ed24de58284a96f2a643bed8c028658",
         "message":"This is me testing the windows client.",
         "modified":[
            "README.md"
         ],
         "removed":[

         ],
         "timestamp":"2013-02-22T14:07:13-08:00",
         "url":"https://github.com/octokitty/testing/commit/36c5f2243ed24de58284a96f2a643bed8c028658"
      },
      {
         "added":[
            "words/madame-bovary.txt"
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
   ],
   "compare":"https://github.com/octokitty/testing/compare/17c497ccc7cc...1481a2de7b2a",
   "created":false,
   "deleted":true,
   "forced":false,
   "head_commit":{
      "added":[
         "words/madame-bovary.txt"
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
   },
   "pusher":{
      "name":"none"
   },
   "ref":"refs/heads/master",
   "repository":{
      "created_at":1332977768,
      "description":"",
      "fork":false,
      "forks":0,
      "has_downloads":true,
      "has_issues":true,
      "has_wiki":true,
      "homepage":"",
      "id":3860742,
      "language":"Ruby",
      "master_branch":"master",
      "name":"testing",
      "open_issues":2,
      "owner":{
         "email":"lolwut@noway.biz",
         "name":"octokitty"
      },
      "private":false,
      "pushed_at":1363295520,
      "size":2156,
      "stargazers":1,
      "url":"https://github.com/octokitty/testing",
      "watchers":1
   }
}
ENDJSON;
        return $testData;
    }

    private function getAndMapPayload()
    {
        $payloadObject = new Payload();
        $mapper = new PayloadMapper($payloadObject);
        $mapper->mapFromJson($this->getTestJson());
        return $payloadObject;
    }

    public function testMapAfter()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals('1481a2de7b2a7d02428ad93446ab166be7793fbb', $payloadObject->getAfter(), "After was mapped incorrectly");
    }

    public function testMapBefore()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals('17c497ccc7cca9c2f735aa07e9e3813060ce9a6a', $payloadObject->getBefore(), "Before was mapped incorrectly");
    }

    public function testMapCommits()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals(3, count($payloadObject->getCommits()), "Number of commits is incorrect");
        foreach($payloadObject->getCommits() as $commit) {
            $this->assertInstanceOf('\\afoozle\\GithubWebhook\\Payload\\Commit', $commit, "Commit is of incorrect type");
        }
    }

    public function testMapCompare()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals('https://github.com/octokitty/testing/compare/17c497ccc7cc...1481a2de7b2a', $payloadObject->getCompare(), "Compare mapped incorrectly");
    }

    public function testMapCreated()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals(false, $payloadObject->getCreated(), "Created mapped incorrectly");
    }

    public function testMapDeleted()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals(true, $payloadObject->getDeleted(), "Deleted mapped incorrectly");
    }

    public function testMapForced()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals(false, $payloadObject->getForced(), "Forced mapped incorrectly");
    }

    public function testMapHeadCommit()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertInstanceOf('\\afoozle\\GithubWebhook\\Payload\\Commit', $payloadObject->getHeadCommit(), "Head commit is not the correct type");
    }

    public function testMapPusher()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals(null, $payloadObject->getPusher(), "Pusher mapped incorrectly");
    }

    public function testMapRef()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertEquals('refs/heads/master', $payloadObject->getRef(), "Ref mapped incorrectly");
    }

    public function testMapRepository()
    {
        $payloadObject = $this->getAndMapPayload();
        $this->assertInstanceOf('\\afoozle\\GithubWebhook\\Payload\\Repository', $payloadObject->getRepository(), "Repository is not the correct type");
    }
}

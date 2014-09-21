<?php
/**
 * Tests for RepositoryMapper
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

class RepositoryMapperTest extends \PHPUnit_Framework_TestCase {

    private function getTestJson()
    {
        $testJson = <<<ENDJSON
{
      "created_at":1332977768,
      "description":"repository description",
      "fork":true,
      "forks":2,
      "has_downloads":true,
      "has_issues":true,
      "has_wiki":true,
      "homepage":"http://abc.example.com",
      "id":3860742,
      "language":"PHP",
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
ENDJSON;
        return $testJson;
    }

    private function getAndMapEntity()
    {
        $mapper = new RepositoryMapper();
        $repositoryObject = $mapper->mapFromJson($this->getTestJson());
        return $repositoryObject;
    }

    public function testMapWithInvalidJson()
    {
        $mapper = new RepositoryMapper();

        try {
            $mapper->mapFromJson('this is not json');
            $this->fail("An expected InvalidArgumentException was not thrown");
        }
        catch (\InvalidArgumentException $expected){
            return;
        }
    }

    public function testMapCreatedAt()
    {
        $repositoryObject = $this->getAndMapEntity();
        $expectedDate = \DateTime::createFromFormat('U', '1332977768',new \DateTimeZone('UTC'));
        $this->assertEquals($expectedDate, $repositoryObject->getCreatedAt(), "CreatedAt mapped incorrectly");
    }

    public function testMapDescription()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals('repository description', $repositoryObject->getDescription(), "Description mapped incorrectly");
    }

    public function testMapFork()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(true, $repositoryObject->isFork(), "Fork mapped incorrectly");
    }

    public function testMapForks()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(2, $repositoryObject->getForks(), "Forks mapped incorrectly");
    }

    public function testMapHasDownloads()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(true, $repositoryObject->hasDownloads(), "HasDownloads mapped incorrectly");
    }

    public function testMapHasIssues()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(true, $repositoryObject->hasIssues(), "HasIssues mapped incorrectly");
    }

    public function testMapHasWiki()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(true, $repositoryObject->hasWiki(), "HasWiki mapped incorrectly");
    }

    public function testMapHomepage()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals("http://abc.example.com", $repositoryObject->getHomepage(), "Homepage mapped incorrectly");
    }

    public function testMapId()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(3860742, $repositoryObject->getId(), "Id mapped incorrectly");
    }

    public function testMapLanguage()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals("PHP", $repositoryObject->getLanguage(), "Language mapped incorrectly");
    }

    public function testMapMasterBranch()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals("master", $repositoryObject->getMasterBranch(), "MasterBranch mapped incorrectly");
    }

    public function testMapName()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals("testing", $repositoryObject->getName(), "Name mapped incorrectly");
    }

    public function testMapOpenIssues()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(2, $repositoryObject->getOpenIssues(), "OpenIssues mapped incorrectly");
    }

    public function testMapOwner()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertInstanceOf('\\afoozle\GithubWebhook\Entity\Person', $repositoryObject->getOwner());
    }

    public function testMapPrivate()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(false, $repositoryObject->isPrivate(), "Private mapped incorrectly");
    }

    public function testMapPushedAt()
    {
        $repositoryObject = $this->getAndMapEntity();
        $expectedDate = \DateTime::createFromFormat('U', '1363295520',new \DateTimeZone('UTC'));
        $this->assertEquals($expectedDate, $repositoryObject->getPushedAt(), "PushedAt mapped incorrectly");
    }

    public function testMapSize()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(2156, $repositoryObject->getSize(), "Size mapped incorrectly");
    }

    public function testMapStargazers()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(1, $repositoryObject->getStargazers(), "Stargazers mapped incorrectly");
    }

    public function testMapUrl()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals("https://github.com/octokitty/testing", $repositoryObject->getUrl(), "Url mapped incorrectly");
    }

    public function testMapWatchers()
    {
        $repositoryObject = $this->getAndMapEntity();
        $this->assertEquals(1, $repositoryObject->getWatchers(), "Watchers mapped incorrectly");
    }
}


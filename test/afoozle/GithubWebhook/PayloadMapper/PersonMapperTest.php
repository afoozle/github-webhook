<?php
namespace afoozle\GithubWebhook\PayloadMapper;

use afoozle\GithubWebhook\Payload\Person;

class PersonMapperTest extends \PHPUnit_Framework_TestCase {

    private function getTestJson()
    {
        $testJson = <<<ENDJSON
{
    "email":"lolwut@noway.biz",
    "name":"Garen Torikian",
    "username":"octokitty"
}
ENDJSON;
        return $testJson;
    }

    private function getAndMapPayload()
    {
        $personObject = new Person();
        $mapper = new PersonMapper($personObject);
        $mapper->mapFromJson($this->getTestJson());
        return $personObject;
    }

    public function testMapName()
    {
        $personObject = $this->getAndMapPayload();
        $this->assertEquals("Garen Torikian", $personObject->getName(), "Name mapped incorrectly");
    }

    public function testMapEmail()
    {
        $personObject = $this->getAndMapPayload();
        $this->assertEquals("lolwut@noway.biz", $personObject->getEmail(), "Email mapped incorrectly");
    }

    public function testMapUsername()
    {
        $personObject = $this->getAndMapPayload();
        $this->assertEquals("octokitty", $personObject->getUsername(), "Username mapped incorrectly");
    }
}
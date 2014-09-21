<?php
/**
 * Tests for PersonMapper
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

use afoozle\GithubWebhook\Entity\Person;

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

    public function testMapWithInvalidJson()
    {
        $mapper = new PersonMapper();

        try {
            $mapper->mapFromJson('this is not json');
            $this->fail("An expected InvalidArgumentException was not thrown");
        }
        catch (\InvalidArgumentException $expected){
            return;
        }
    }

    private function getAndMapEntity()
    {
        $mapper = new PersonMapper();
        $personObject = $mapper->mapFromJson($this->getTestJson());
        return $personObject;
    }

    public function testMapName()
    {
        $personObject = $this->getAndMapEntity();
        $this->assertEquals("Garen Torikian", $personObject->getName(), "Name mapped incorrectly");
    }

    public function testMapEmail()
    {
        $personObject = $this->getAndMapEntity();
        $this->assertEquals("lolwut@noway.biz", $personObject->getEmail(), "Email mapped incorrectly");
    }

    public function testMapUsername()
    {
        $personObject = $this->getAndMapEntity();
        $this->assertEquals("octokitty", $personObject->getUsername(), "Username mapped incorrectly");
    }
}

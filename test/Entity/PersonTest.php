<?php
/**
 * Tests for Person
 *
 * Copyright (c) Matthew Wheeler <matt@yurisko.net>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 *
 * @author     Matthew Wheeler <matt@yurisko.net>
 * @license    MIT
 */
namespace afoozle\GithubWebhook\Entity;

class PersonTest extends \PHPUnit_Framework_TestCase
{
    public function testObjectInstantiation()
    {
        $person = new Person();
    }

    public function testToString()
    {
        $commit = new Person();
        $this->assertInternalType('string', $commit->__toString());
        $this->assertGreaterThan(0, strlen($commit->__toString()));
    }

    public function testJsonSerialize()
    {
        $commit = new Person();
        $commit->setName('Name');
        $this->assertInternalType('array', $commit->jsonSerialize());
    }
}

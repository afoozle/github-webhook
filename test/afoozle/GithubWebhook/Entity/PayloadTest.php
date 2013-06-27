<?php
/**
 * Tests for Payload
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

class EntityTest extends \PHPUnit_Framework_TestCase {

    public function testClassInstantiation()
    {
        $payload = new Payload();
    }

    public function testToString()
    {
        $commit = new Payload();
        $this->assertInternalType('string', $commit->__toString());
        $this->assertGreaterThan(0, strlen($commit->__toString()));
    }

    public function testJsonSerialize()
    {
        $commit = new Payload();
        $commit->setAfter('After');
        $this->assertInternalType('array', $commit->jsonSerialize());
    }
}

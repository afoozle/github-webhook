<?php
/**
 * Tests for Commit
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

class CommitTest extends \PHPUnit_Framework_TestCase {

    public function testInstantiateObject()
    {
        $commit = new Commit();
    }

    public function testToString()
    {
        $commit = new Commit();
        $this->assertInternalType('string', $commit->__toString());
        $this->assertGreaterThan(0, strlen($commit->__toString()));
    }

    public function testJsonSerialize()
    {
        $commit = new Commit();
        $commit->setMessage('Message');
        $this->assertInternalType('array', $commit->jsonSerialize());
    }
}

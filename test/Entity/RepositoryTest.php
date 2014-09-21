<?php
/**
 * Tests for Repository
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

class RepositoryTest extends \PHPUnit_Framework_TestCase {

    public function testObjectInstantiation()
    {
        $repository = new Repository();
    }

    public function testToString()
    {
        $commit = new Repository();
        $this->assertInternalType('string', $commit->__toString());
        $this->assertGreaterThan(0, strlen($commit->__toString()));
    }

    public function testJsonSerialize()
    {
        $commit = new Repository();
        $commit->setName('Name');
        $this->assertInternalType('array', $commit->jsonSerialize());
    }
}

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
}

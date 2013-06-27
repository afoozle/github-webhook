<?php
/**
 * Interface for Serialisable Entities
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

interface SerializableEntityInterface {

    /**
     * @return array
     */
    public function jsonSerialize();

    /**
     * @return string
     */
    public function __toString();
}
<?php
/**
 * Mapper class to map values into a Person
 *
 * Copyright (c) Matthew Wheeler <matt@yurisko.net>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 *
 * @author     Matthew Wheeler <matt@yurisko.net>
 * @license    MIT
 */
namespace afoozle\GithubWebhook\PayloadMapper;

use afoozle\GithubWebhook\Payload\Person;

class PersonMapper implements PayloadMapperInterface {

    /**
     * @param string $jsonData
     * @throws \InvalidArgumentException
     * @return Person
     */
    public function mapFromJson($jsonData)
    {
        $parsedData = json_decode($jsonData, true);
        if ($parsedData === null) {
            throw new \InvalidArgumentException("Unable to parse json data: $jsonData");
        }
        return $this->mapFromDataArray($parsedData);
    }
    /**
     * @param array $dataArray
     * @return Person
     */
    public function mapFromDataArray(array $dataArray)
    {
        $person = new Person();
        
        if (array_key_exists('name', $dataArray)) {
            $person->setName(trim($dataArray['name']));
        }

        if (array_key_exists('email', $dataArray)) {
            $person->setEmail(trim($dataArray['email']));
        }

        if (array_key_exists('username', $dataArray)) {
            $person->setUsername(trim($dataArray['username']));
        }
        
        return $person;
    }
}
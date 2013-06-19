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
     * @var Person
     */
    private $dataObject = null;

    /**
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->dataObject = $person;
    }

    /**
     * @param string $jsonData
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function mapFromJson($jsonData)
    {
        $parsedData = json_decode($jsonData, true);
        if ($parsedData === null) {
            throw new \InvalidArgumentException("Unable to parse json data: $jsonData");
        }
        $this->mapFromDataArray($parsedData);
    }
    /**
     * @param array $dataArray
     * @return mixed
     */
    public function mapFromDataArray(array $dataArray)
    {
        if (array_key_exists('name', $dataArray)) {
            $this->dataObject->setName(trim($dataArray['name']));
        }

        if (array_key_exists('email', $dataArray)) {
            $this->dataObject->setEmail(trim($dataArray['email']));
        }

        if (array_key_exists('username', $dataArray)) {
            $this->dataObject->setUsername(trim($dataArray['username']));
        }
    }
}
<?php
/**
 * Mapper class to map values into a Payload
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

use afoozle\GithubWebhook\Entity\Payload;

/**
 * Class Entity
 * @package afoozle\GithubWebhook\EntityMapper
 */
class PayloadMapper implements EntityMapperInterface {

    /**
     * @param string $jsonData
     * @throws \InvalidArgumentException
     * @return \afoozle\GithubWebhook\Entity\Payload
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
     * @return Payload
     */
    public function mapFromDataArray(array $dataArray)
    {
        $payload = new Payload();
        $this->mapScalarValues($payload, $dataArray);
        $this->mapCommits($payload, $dataArray);
        $this->mapHeadCommit($payload, $dataArray);
        $this->mapRepository($payload, $dataArray);

        return $payload;
    }

    /**
     * Map all scalar values into the payload object
     * @param \afoozle\GithubWebhook\Entity\Payload $payload
     * @param array $parsedData
     * @return \afoozle\GithubWebhook\Entity\Payload
     */
    private function mapScalarValues(Payload $payload, array $parsedData)
    {
        if (array_key_exists('after', $parsedData)) {
            $payload->setAfter(trim($parsedData['after']));
        }

        if (array_key_exists('before', $parsedData)) {
            $payload->setBefore(trim($parsedData['before']));
        }

        if (array_key_exists('compare', $parsedData)) {
            $payload->setCompare(trim($parsedData['compare']));
        }

        if (array_key_exists('created', $parsedData)) {
            $created = $parsedData['created'] == 'true' ? true : false;
            $payload->setCreated($created);
        }

        if (array_key_exists('deleted', $parsedData)) {
            $created = $parsedData['deleted'] == 'true' ? true : false;
            $payload->setDeleted($created);
        }

        if (array_key_exists('forced', $parsedData)) {
            $created = $parsedData['forced'] == 'true' ? true : false;
            $payload->setForced($created);
        }

        if (array_key_exists('pusher', $parsedData)) {
            $personMapper = new PersonMapper();
            $pusher = $personMapper->mapFromDataArray($parsedData['pusher']);
            $payload->setPusher($pusher);
        }

        if (array_key_exists('ref', $parsedData)) {
            $payload->setRef($parsedData['ref']);
        }

        return $payload;
    }

    /**
     * @param \afoozle\GithubWebhook\Entity\Payload $payload
     * @param array $parsedData
     * @return \afoozle\GithubWebhook\Entity\Payload
     */
    private function mapCommits(Payload $payload, array $parsedData)
    {
        if (array_key_exists('commits', $parsedData)){
            $commitObjects = array();
            foreach($parsedData['commits'] as $commitData) {
                $commitMapper = new CommitMapper();
                $commitObject = $commitMapper->mapFromDataArray($commitData);
                $commitObjects[] = $commitObject;
            }
            $payload->setCommits($commitObjects);
        }
        return $payload;
    }

    /**
     * @param \afoozle\GithubWebhook\Entity\Payload $payload
     * @param array $parsedData
     * @return \afoozle\GithubWebhook\Entity\Payload
     */
    private function mapHeadCommit(Payload $payload, array $parsedData)
    {
        $commitMapper = new CommitMapper();
        $commitObject = $commitMapper->mapFromDataArray($parsedData);
        $payload->setHeadCommit($commitObject);
        return $payload;
    }

    /**
     * @param \afoozle\GithubWebhook\Entity\Payload $payload
     * @param array $parsedData
     * @return \afoozle\GithubWebhook\Entity\Payload
     */
    private function mapRepository(Payload $payload, array $parsedData)
    {
        $repositoryMapper = new RepositoryMapper();
        $repositoryObject = $repositoryMapper->mapFromDataArray($parsedData['repository']);
        $payload->setRepository($repositoryObject);
        return $payload;
    }
}

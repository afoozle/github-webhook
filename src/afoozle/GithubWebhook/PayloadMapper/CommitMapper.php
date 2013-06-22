<?php
/**
 * Mapper class to map values into a Commit
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

use afoozle\GithubWebhook\Payload\Commit;

class CommitMapper implements PayloadMapperInterface {

    /**
     * @param string $jsonData
     * @throws \InvalidArgumentException
     * @return Commit
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
     * @return Commit
     */
    public function mapFromDataArray(array $dataArray)
    {
        $commit = new Commit();
        
        if (array_key_exists('added', $dataArray)) {
            $commit->setAdded((array)$dataArray['added']);
        }

        if (array_key_exists('id', $dataArray)) {
            $commit->setId(trim($dataArray['id']));
        }

        if (array_key_exists('distinct', $dataArray)) {
            $commit->setIsDistinct((bool)$dataArray['distinct']);
        }

        if (array_key_exists('message', $dataArray)) {
            $commit->setMessage(trim($dataArray['message']));
        }

        if (array_key_exists('removed', $dataArray)) {
            $commit->setRemoved((array)$dataArray['removed']);
        }

        if (array_key_exists('timestamp', $dataArray)) {
            $timestamp = new \DateTime($dataArray['timestamp']);
            $commit->setTimestamp($timestamp);
        }

        if (array_key_exists('url', $dataArray)) {
            $commit->setUrl(trim($dataArray['url']));
        }

        if (array_key_exists('committer', $dataArray)) {
            $personMapper = new PersonMapper();
            $committer = $personMapper->mapFromDataArray($dataArray['committer']);
            $commit->setCommitter($committer);
        }

        if (array_key_exists('author', $dataArray)) {
            $personMapper = new PersonMapper();
            $author = $personMapper->mapFromDataArray($dataArray['author']);
            $commit->setAuthor($author);
        }

        return $commit;
    }
}
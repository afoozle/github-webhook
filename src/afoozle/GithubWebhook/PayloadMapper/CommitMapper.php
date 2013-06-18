<?php
namespace afoozle\GithubWebhook\PayloadMapper;

use afoozle\GithubWebhook\Payload\Commit;

class CommitMapper implements PayloadMapperInterface {

    /**
     * @var Commit
     */
    private $dataObject = null;

    /**
     * @param Commit $commit
     */
    public function __construct(Commit $commit)
    {
        $this->dataObject = $commit;
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
        if (array_key_exists('added', $dataArray)) {
            $this->dataObject->setAdded((array)$dataArray['added']);
        }

        if (array_key_exists('id', $dataArray)) {
            $this->dataObject->setId(trim($dataArray['id']));
        }

        if (array_key_exists('distinct', $dataArray)) {
            $this->dataObject->setIsDistinct((bool)$dataArray['distinct']);
        }

        if (array_key_exists('message', $dataArray)) {
            $this->dataObject->setMessage(trim($dataArray['message']));
        }

        if (array_key_exists('removed', $dataArray)) {
            $this->dataObject->setRemoved((array)$dataArray['removed']);
        }

        if (array_key_exists('timestamp', $dataArray)) {
            $timestamp = new \DateTime($dataArray['timestamp']);
            $this->dataObject->setTimestamp($timestamp);
        }

        if (array_key_exists('url', $dataArray)) {
            $this->dataObject->setUrl(trim($dataArray['url']));
        }
    }
}
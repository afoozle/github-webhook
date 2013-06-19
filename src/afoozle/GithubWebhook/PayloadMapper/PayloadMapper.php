<?php
namespace afoozle\GithubWebhook\PayloadMapper;

use afoozle\GithubWebhook\Payload\Commit;
use afoozle\GithubWebhook\Payload\Payload;
use afoozle\GithubWebhook\Payload\Person;
use afoozle\GithubWebhook\Payload\Repository;

/**
 * Class Payload
 * @package afoozle\GithubWebhook\PayloadMapper
 */
class PayloadMapper implements PayloadMapperInterface {

    /**
     * @var Payload
     */
    private $payloadObject = null;

    /**
     * Constructor
     *
     * @param Payload $payloadObject
     */
    public function __construct(Payload $payloadObject){
        $this->payloadObject = $payloadObject;
    }

    /**
     * @return Payload
     */
    public function getPayloadObject()
    {
        return $this->payloadObject;
    }

    /**
     * @param $jsonData
     * @return void
     * @throws \InvalidArgumentException
     */
    public function mapFromJson($jsonData)
    {
        $parsedData = json_decode($jsonData, true);
        if ($parsedData === null) {
            throw new \InvalidArgumentException("Unable to parse json data: $jsonData");
        }
        $this->mapFromDataArray($parsedData);
    }

    public function mapFromDataArray(array $dataArray)
    {
        $this->mapScalarValues($dataArray);
        $this->mapCommits($dataArray);
        $this->mapHeadCommit($dataArray);
        $this->mapRepository($dataArray);
    }

    /**
     * Map all scalar values into the payload object
     * @param array $parsedData
     */
    private function mapScalarValues(array $parsedData)
    {
        if (array_key_exists('after', $parsedData)) {
            $this->getPayloadObject()->setAfter(trim($parsedData['after']));
        }

        if (array_key_exists('before', $parsedData)) {
            $this->getPayloadObject()->setBefore(trim($parsedData['before']));
        }

        if (array_key_exists('compare', $parsedData)) {
            $this->getPayloadObject()->setCompare(trim($parsedData['compare']));
        }

        if (array_key_exists('created', $parsedData)) {
            $created = $parsedData['created'] == 'true' ? true : false;
            $this->getPayloadObject()->setCreated($created);
        }

        if (array_key_exists('deleted', $parsedData)) {
            $created = $parsedData['deleted'] == 'true' ? true : false;
            $this->getPayloadObject()->setDeleted($created);
        }

        if (array_key_exists('forced', $parsedData)) {
            $created = $parsedData['forced'] == 'true' ? true : false;
            $this->getPayloadObject()->setForced($created);
        }

        if (array_key_exists('pusher', $parsedData)) {
            $pusher = new Person();
            $personMapper = new PersonMapper($pusher);
            $personMapper->mapFromDataArray($parsedData['pusher']);
            $this->getPayloadObject()->setPusher($pusher);
        }

        if (array_key_exists('ref', $parsedData)) {
            $this->getPayloadObject()->setRef($parsedData['ref']);
        }
    }

    /**
     * @param array $parsedData
     */
    private function mapCommits(array $parsedData)
    {
        if (array_key_exists('commits', $parsedData)){
            $commitObjects = array();
            foreach($parsedData['commits'] as $commitData) {
                $commitObject = new Commit();
                $commitMapper = new CommitMapper($commitObject);
                $commitMapper->mapFromDataArray($commitData);
                $commitObjects[] = $commitObject;
            }
            $this->getPayloadObject()->setCommits($commitObjects);
        }
    }

    /**
     * @param array $parsedData
     */
    private function mapHeadCommit(array $parsedData)
    {
        $commitObject = new Commit();
        $commitMapper = new CommitMapper($commitObject);
        $commitMapper->mapFromDataArray($parsedData);
        $this->getPayloadObject()->setHeadCommit($commitObject);
    }

    /**
     * @param array $parsedData
     */
    private function mapRepository(array $parsedData)
    {
        $repositoryObject = new Repository();
        $repositoryMapper = new RepositoryMapper($repositoryObject);
        $repositoryMapper->mapFromDataArray($parsedData['repository']);
        $this->getPayloadObject()->setRepository($repositoryObject);
    }
}
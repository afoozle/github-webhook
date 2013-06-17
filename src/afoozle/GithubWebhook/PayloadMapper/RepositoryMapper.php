<?php
namespace afoozle\GithubWebhook\PayloadMapper;

use afoozle\GithubWebhook\Payload\Repository;

class RepositoryMapper implements PayloadMapperInterface {

    /**
     * @var \afoozle\GithubWebhook\Payload\Repository
     */
    private $repositoryObject;

    public function __construct(Repository $repositoryObject)
    {
        $this->repositoryObject = $repositoryObject;
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
    }


    private function mapScalarValues(array $parsedData)
    {
        if (array_key_exists('created_at', $parsedData)) {
            $createdAt = \DateTime::createFromFormat('U', trim($parsedData['created_at']), new \DateTimeZone('UTC'));
            $this->repositoryObject->setCreatedAt($createdAt);
        }

        if (array_key_exists('description', $parsedData)) {
            $this->repositoryObject->setDescription(trim($parsedData['description']));
        }

        if (array_key_exists('fork', $parsedData)) {
            $isFork = $parsedData['fork'] == 'true' ? true : false;
            $this->repositoryObject->setIsFork($isFork);
        }

        if (array_key_exists('has_downloads', $parsedData)) {
            $hasDownloads = $parsedData['has_downloads'] == 'true' ? true : false;
            $this->repositoryObject->setHasDownloads($hasDownloads);
        }

        if (array_key_exists('has_issues', $parsedData)) {
            $hasIssues = $parsedData['has_issues'] == 'true' ? true : false;
            $this->repositoryObject->setHasIssues($hasIssues);
        }

        if (array_key_exists('has_wiki', $parsedData)) {
            $hasWiki = $parsedData['has_wiki'] == 'true' ? true : false;
            $this->repositoryObject->setHasWiki($hasWiki);
        }

        if (array_key_exists('private', $parsedData)) {
            $isPrivate = $parsedData['private'] == 'true' ? true : false;
            $this->repositoryObject->setIsPrivate($isPrivate);
        }

        if (array_key_exists('forks', $parsedData)) {
            $this->repositoryObject->setForks((int)$parsedData['forks']);
        }

        if (array_key_exists('homepage', $parsedData)) {
            $this->repositoryObject->setHomepage(trim($parsedData['homepage']));
        }

        if (array_key_exists('id', $parsedData)) {
            $this->repositoryObject->setId((int)$parsedData['id']);
        }

        if (array_key_exists('language', $parsedData)) {
            $this->repositoryObject->setLanguage(trim($parsedData['language']));
        }

        if (array_key_exists('master_branch', $parsedData)) {
            $this->repositoryObject->setMasterBranch(trim($parsedData['master_branch']));
        }

        if (array_key_exists('name', $parsedData)) {
            $this->repositoryObject->setName(trim($parsedData['name']));
        }

        if (array_key_exists('open_issues', $parsedData)) {
            $this->repositoryObject->setOpenIssues((int)$parsedData['open_issues']);
        }

        if (array_key_exists('size', $parsedData)) {
            $this->repositoryObject->setSize((int)$parsedData['size']);
        }

        if (array_key_exists('stargazers', $parsedData)) {
            $this->repositoryObject->setStargazers((int)$parsedData['stargazers']);
        }

        if (array_key_exists('url', $parsedData)) {
            $this->repositoryObject->setUrl(trim($parsedData['url']));
        }

        if (array_key_exists('watchers', $parsedData)) {
            $this->repositoryObject->setWatchers((int)$parsedData['watchers']);
        }


//      "owner":{
//        "email":"lolwut@noway.biz",
//         "name":"octokitty"
//      },

        if (array_key_exists('pushed_at', $parsedData)) {
            $pushedAt = \DateTime::createFromFormat('U', trim($parsedData['pushed_at']), new \DateTimeZone('UTC'));
            $this->repositoryObject->setPushedAt($pushedAt);
        }
    }

}
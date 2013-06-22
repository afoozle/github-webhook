<?php
/**
 * Mapper class to map values into a Repository
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

use afoozle\GithubWebhook\Entity\Repository;

class RepositoryMapper implements EntityMapperInterface {

    /**
     * @param $jsonData
     * @return Repository
     * @throws \InvalidArgumentException
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
     * @param array $parsedData
     * @return Repository
     */
    public function mapFromDataArray(array $parsedData)
    {
        $repository = new Repository();
        
        if (array_key_exists('created_at', $parsedData)) {
            $createdAt = \DateTime::createFromFormat('U', trim($parsedData['created_at']), new \DateTimeZone('UTC'));
            $repository->setCreatedAt($createdAt);
        }

        if (array_key_exists('description', $parsedData)) {
            $repository->setDescription(trim($parsedData['description']));
        }

        if (array_key_exists('fork', $parsedData)) {
            $isFork = $parsedData['fork'] == 'true' ? true : false;
            $repository->setIsFork($isFork);
        }

        if (array_key_exists('has_downloads', $parsedData)) {
            $hasDownloads = $parsedData['has_downloads'] == 'true' ? true : false;
            $repository->setHasDownloads($hasDownloads);
        }

        if (array_key_exists('has_issues', $parsedData)) {
            $hasIssues = $parsedData['has_issues'] == 'true' ? true : false;
            $repository->setHasIssues($hasIssues);
        }

        if (array_key_exists('has_wiki', $parsedData)) {
            $hasWiki = $parsedData['has_wiki'] == 'true' ? true : false;
            $repository->setHasWiki($hasWiki);
        }

        if (array_key_exists('private', $parsedData)) {
            $isPrivate = $parsedData['private'] == 'true' ? true : false;
            $repository->setIsPrivate($isPrivate);
        }

        if (array_key_exists('forks', $parsedData)) {
            $repository->setForks((int)$parsedData['forks']);
        }

        if (array_key_exists('homepage', $parsedData)) {
            $repository->setHomepage(trim($parsedData['homepage']));
        }

        if (array_key_exists('id', $parsedData)) {
            $repository->setId((int)$parsedData['id']);
        }

        if (array_key_exists('language', $parsedData)) {
            $repository->setLanguage(trim($parsedData['language']));
        }

        if (array_key_exists('master_branch', $parsedData)) {
            $repository->setMasterBranch(trim($parsedData['master_branch']));
        }

        if (array_key_exists('name', $parsedData)) {
            $repository->setName(trim($parsedData['name']));
        }

        if (array_key_exists('open_issues', $parsedData)) {
            $repository->setOpenIssues((int)$parsedData['open_issues']);
        }

        if (array_key_exists('size', $parsedData)) {
            $repository->setSize((int)$parsedData['size']);
        }

        if (array_key_exists('stargazers', $parsedData)) {
            $repository->setStargazers((int)$parsedData['stargazers']);
        }

        if (array_key_exists('url', $parsedData)) {
            $repository->setUrl(trim($parsedData['url']));
        }

        if (array_key_exists('watchers', $parsedData)) {
            $repository->setWatchers((int)$parsedData['watchers']);
        }

        if (array_key_exists('owner', $parsedData)) {
            $personMapper = new PersonMapper();
            $owner = $personMapper->mapFromDataArray($parsedData['owner']);
            $repository->setOwner($owner);
        }

        if (array_key_exists('pushed_at', $parsedData)) {
            $pushedAt = \DateTime::createFromFormat('U', trim($parsedData['pushed_at']), new \DateTimeZone('UTC'));
            $repository->setPushedAt($pushedAt);
        }

        return $repository;
    }

}

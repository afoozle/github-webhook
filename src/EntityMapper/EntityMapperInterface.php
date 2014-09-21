<?php
/**
 * Interface for a class to map values
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


interface EntityMapperInterface {
    /**
     * @param string $jsonData
     * @return mixed
     */
    public function mapFromJson($jsonData);

    /**
     * @param array $dataArray
     * @return mixed
     */
    public function mapFromDataArray(array $dataArray);
}

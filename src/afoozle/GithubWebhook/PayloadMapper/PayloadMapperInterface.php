<?php
/**
 * Created by JetBrains PhpStorm.
 * User: afoozle
 * Date: 17/06/13
 * Time: 9:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace afoozle\GithubWebhook\PayloadMapper;


interface PayloadMapperInterface {
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
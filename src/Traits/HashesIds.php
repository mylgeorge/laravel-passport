<?php
/**
 * Created by PhpStorm.
 * User: giorgos
 * Date: 12/4/2018
 * Time: 3:23 μμ
 */

namespace Passport\Traits;

use Hashids\Hashids;

trait HashesIds
{
    /**
     * @var Hashids $hashIds
     */
    protected $hashIds;

    public function __construct()
    {
        $this->hashIds = new Hashids(config('app.key'));
    }
    /**
     * Hashes the regular incrementing integer id
     *
     * @param $id
     * @return string
     */
    protected function encode($id)
    {
        return \Hashids::connection('client_id')->encode($id);
    }
    /**
     * UnHashes the hashed client_id into the auto-incrementing integer
     *
     * @param $client_id
     * @return mixed
     */
    protected function decode($client_id)
    {
        return \Hashids::connection('client_id')->decode($client_id);
    }
}
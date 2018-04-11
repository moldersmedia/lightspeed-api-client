<?php namespace MoldersMedia\LightspeedApi\Traits;

use Classes\ApiConnection;

/**
 * Trait ApiHelper
 *
 * @property ApiConnection client
 *
 * @package MoldersMedia\LightspeedApi\Traits
 */
trait ApiHelper
{
    /**
     * Calculate how many pages there are based on the "perPage" and items
     * that are counted
     *
     * @param $items
     * @return int
     */
    public function calculatePages($items)
    {
        return (int)ceil($items / $this->client->getPerPage());
    }
}
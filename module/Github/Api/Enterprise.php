<?php

namespace app\module\Github\Api;

use app\module\Github\Api\Enterprise\ManagementConsole;
use app\module\Github\Api\Enterprise\Stats;
use app\module\Github\Api\Enterprise\License;

/**
 * Getting information about a GitHub Enterprise instance.
 *
 * @link   https://developer.github.com/v3/enterprise/
 * @author Joseph Bielawski <stloyd@gmail.com>
 * @author Guillermo A. Fisher <guillermoandraefisher@gmail.com>
 */
class Enterprise extends AbstractApi
{
    /**
     * @return Stats
     */
    public function stats()
    {
        return new Stats($this->client);
    }

    /**
     * @return License
     */
    public function license()
    {
        return new License($this->client);
    }

    /**
     * @return ManagementConsole
     */
    public function console()
    {
        return new ManagementConsole($this->client);
    }
}

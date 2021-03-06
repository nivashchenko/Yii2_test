<?php

namespace app\module\Github\Api\CurrentUser;

use app\module\Github\Api\AbstractApi;

/**
 * @link   https://developer.github.com/v3/activity/starring/
 * @author Felipe Valtl de Mello <eu@felipe.im>
 */
class Starring extends AbstractApi
{
    /**
     * List repositories starred by the authenticated user
     * @link https://developer.github.com/v3/activity/starring/
     *
     * @param  integer $page
     * @return array
     */
    public function all($page = 1)
    {
        return $this->get('user/starred', array(
            'page' => $page
        ));
    }

    /**
     * Check that the authenticated user starres a repository
     * @link https://developer.github.com/v3/activity/starring/
     *
     * @param  string $username   the user who owns the repo
     * @param  string $repository the name of the repo
     * @return array
     */
    public function check($username, $repository)
    {
        return $this->get('user/starred/'.rawurlencode($username).'/'.rawurlencode($repository));
    }

    /**
     * Make the authenticated user star a repository
     * @link https://developer.github.com/v3/activity/starring/
     *
     * @param  string $username   the user who owns the repo
     * @param  string $repository the name of the repo
     * @return array
     */
    public function star($username, $repository)
    {
        return $this->put('user/starred/'.rawurlencode($username).'/'.rawurlencode($repository));
    }

    /**
     * Make the authenticated user unstar a repository
     * @link https://developer.github.com/v3/activity/starring
     *
     * @param  string $username   the user who owns the repo
     * @param  string $repository the name of the repo
     * @return array
     */
    public function unstar($username, $repository)
    {
        return $this->delete('user/starred/'.rawurlencode($username).'/'.rawurlencode($repository));
    }
}

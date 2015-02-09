<?php

namespace app\module\Github\Api\Issue;

use app\module\Github\Api\AbstractApi;
use app\module\Github\Exception\MissingArgumentException;

/**
 * @link   http://developer.github.com/v3/issues/comments/
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Comments extends AbstractApi
{
    public function configure($bodyType = null)
    {
        switch ($bodyType) {
            case 'raw':
                $header = sprintf('Accept: application/vnd.github.%s.raw+json', $this->client->getOption('api_version'));
                break;

            case 'text':
                $header = sprintf('Accept: application/vnd.github.%s.text+json', $this->client->getOption('api_version'));
                break;

            case 'html':
                $header = sprintf('Accept: application/vnd.github.%s.html+json', $this->client->getOption('api_version'));
                break;

            default:
                $header = sprintf('Accept: application/vnd.github.%s.full+json', $this->client->getOption('api_version'));
        }

        $this->client->setHeaders(array($header));
    }

    public function all($username, $repository, $issue, $page = 1)
    {
        return $this->get('repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/issues/'.rawurlencode($issue).'/comments', array(
            'page' => $page
        ));
    }

    public function show($username, $repository, $comment)
    {
        return $this->get('repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/issues/comments/'.rawurlencode($comment));
    }

    public function create($username, $repository, $issue, array $params)
    {
        if (!isset($params['body'])) {
            throw new MissingArgumentException('body');
        }

        return $this->post('repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/issues/'.rawurlencode($issue).'/comments', $params);
    }

    public function update($username, $repository, $comment, array $params)
    {
        if (!isset($params['body'])) {
            throw new MissingArgumentException('body');
        }

        return $this->patch('repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/issues/comments/'.rawurlencode($comment), $params);
    }

    public function remove($username, $repository, $comment)
    {
        return $this->delete('repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/issues/comments/'.rawurlencode($comment));
    }
}
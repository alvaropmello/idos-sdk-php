<?php

namespace idOS\Endpoint\Profile\Process;

use GuzzleHttp\Client;
use idOS\Auth\AuthInterface;
use idOS\Endpoint\Profile\Process\AbstractProcessEndpoint;
use idOS\Endpoint\AbstractEndpoint;

/**
 * Tasks Class Endpoint
 */
class Tasks extends AbstractProcessEndpoint {

    /**
     * Creates a new task for the given user.
     *
     * @param string $name
     * @param string $event
     * @param boolean $running
     * @param boolean $success
     * @param string $message
     * @return Array Response
     */
    public function createNew(
        string $name,
        string $event,
        boolean $running,
        boolean $success,
        string $message
    ) : array {

        return $this->sendPost(
            sprintf('/profiles/%s/processes/%s/tasks', $this->userName, $this->processId),
            [],
            [
                'name' => $name,
                'event' => $event,
                'running' => $running,
                'success' => $success,
                'message' => $message
            ]
        );
    }

    /**
     * Lists all tasks
     *
     * @param  array  $filters
     * @return Array Response
     */
    public function listAll(array $filters = []) : array {
        return $this->sendGet(
            sprintf('/profiles/%s/processes/%s/tasks', $this->userName, $this->processId),
            $filters
        );
    }

    /**
     * Retrieves a task given its slug
     *
     * @param  int $taskId
     * @return Array Response
     */
    public function getOne(int $taskId) : array {
        return $this->sendGet(
            sprintf('/profiles/%s/processes/%s/tasks/%s', $this->userName, $this->processId, $taskId)
        );
    }

    /**
     * Updates a task given its slug
     *
     * @param  int $taskId
     * @param  $value
     * @param  string $type
     * @return Array Response
     */
    public function updateOne(int $taskId, $value, string $type) : array {
        return $this->sendPatch(
            sprintf('/profiles/%s/processes/%s/tasks/%s', $this->userName, $this->processId, $taskId),
            [],
            [
                'value' => $value,
                'type'  => $type
            ]
        );
    }

    /**
     * Deletes a task given its slug
     *
     * @param  int $taskId
     * @return Array Response
     */
    public function deleteOne(int $taskId) : array {
        return $this->sendDelete(
            sprintf('/profiles/%s/processes/%s/tasks/%s', $this->userName, $this->processId, $tasksId)
        );
    }

    /**
     * Deletes all tasks
     *
     * @param  array  $filters
     * @return Array Response
     */
    public function deleteAll(array $filters = []) : array {
        return $this->sendDelete(
            sprintf('/profiles/%s/processes/%s/tasks', $this->userName, $this->processId),
            $filters
        );
    }
}

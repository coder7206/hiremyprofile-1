<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Enqueue extends TwiML {
    /**
     * Enqueue constructor.
     *
     * @param string $name Friendly name
     * @param array $attributes Optional attributes
     */
    public function __construct($name = null, $attributes = []) {
        parent::__construct('Enqueue', $name, $attributes);
    }

    /**
     * Add Task child.
     *
     * @param string $body TaskRouter task attributes
     * @param array $attributes Optional attributes
     * @return Task Child element.
     */
    public function task($body, $attributes = []): Task {
        return $this->nest(new Task($body, $attributes));
    }

    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     */
    public function setAction($action): self {
        return $this->setAttribute('action', $action);
    }

    /**
     * Add MaxQueueSize attribute.
     *
     * @param int $maxQueueSize Maximum size of queue
     */
    public function setMaxQueueSize($maxQueueSize): self {
        return $this->setAttribute('maxQueueSize', $maxQueueSize);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     */
    public function setMethod($method): self {
        return $this->setAttribute('method', $method);
    }

    /**
     * Add WaitUrl attribute.
     *
     * @param string $waitUrl Wait URL
     */
    public function setWaitUrl($waitUrl): self {
        return $this->setAttribute('waitUrl', $waitUrl);
    }

    /**
     * Add WaitUrlMethod attribute.
     *
     * @param string $waitUrlMethod Wait URL method
     */
    public function setWaitUrlMethod($waitUrlMethod): self {
        return $this->setAttribute('waitUrlMethod', $waitUrlMethod);
    }

    /**
     * Add WorkflowSid attribute.
     *
     * @param string $workflowSid TaskRouter Workflow SID
     */
    public function setWorkflowSid($workflowSid): self {
        return $this->setAttribute('workflowSid', $workflowSid);
    }
}
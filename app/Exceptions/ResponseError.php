<?php

namespace App\Exceptions;

use Exception;

class ResponseError extends Exception
{
    protected $statusCode;
    protected $headers;

    public function __construct($message, $statusCode = 400, $previous = null, $headers = [], $code = 0)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;

        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function render() {
        return response()->json([
            'status' => 'error',
            'message' => $this->message
        ])->setStatusCode($this->statusCode);
    }
}

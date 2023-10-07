<?php

namespace App\Exceptions;

use Exception;

class ResponseSuccess extends Exception
{
    protected $data;
    protected $statusCode;

    public function __construct($message, $data = [], $statusCode = 200, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public function getData() {
        return $this->data;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function render() {
        return response()->json([
            'status' => 'success',
            'message' => $this->message,
            'data' => $this->data
        ])->setStatusCode($this->statusCode);
    }
}

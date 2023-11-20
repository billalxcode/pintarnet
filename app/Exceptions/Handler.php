<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                throw new ResponseError($e->getMessage(), 401);
            }
        });

        // $this->renderable(function (ValidationException $e, Request $request) {
        //     if ($request->is('api/*')) {
        //         throw new ResponseError($e->getMessage());
        //     }
        // });

        $this->reportable(function (Throwable $e) {
            // dd($e);
        });
    }
}

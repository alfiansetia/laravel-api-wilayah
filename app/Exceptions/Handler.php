<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request, Throwable $exception)
    // {
    //     if ($exception instanceof ModelNotFoundException) {
    //         $contentTypeHeader = $request->header('Content-Type');

    //         // Cek apakah request meminta respons JSON (Content-Type header berisi 'application/json')
    //         if (strpos($contentTypeHeader, 'application/json') !== false) {
    //             return response()->json(['data' => null, 'message' => 'Not Found!'], 404);
    //         }
    //     }
    //     return parent::render($request, $exception);
    // }
}

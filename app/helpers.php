<?php


if (! function_exists('sendJson')) {

    /**
     * Format json response for consistency.
     *
     * @param  array    $data       (array or object of response to send)
     * @param  string   $message    (Notification message)
     * @param  int      $statusCode (Status code for request)
     *
     * @return object
     */
	function sendJson($data, string $message = "", int $statusCode = 200)
    {
        return response()->json([
            'message'   => $message,
            'data'      => $data
        ], $statusCode);
    }
}

if (! function_exists('abortJson')) {

    /**
     * Format json response for consistency.
     *
     * @param  array    $data       (array or object of response to send)
     * @param  string   $message    (Notification message)
     * @param  int      $statusCode (Status code for request)
     *
     * @return object
     */
	function abortJson($data = [], string $message = "An error occurred", int $statusCode = 400)
    {
        return response()->json([
            'message'   => $message,
            'error'      => $data
        ], $statusCode);
    }
}

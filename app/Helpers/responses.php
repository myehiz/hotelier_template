<?php
/**
 * @param $errors
 * @return \Illuminate\Http\JsonResponse
 */
function validateErrors($errors)
{
    $data = [
        'status' => 'validations',
        'message' => (empty($message)) ? __('response.invalid_data') : $message,
        'errors' => $errors,
    ];

    return response()->json($data, 422);
}

/**
 * @param $data
 * @param int $code
 * @return \Illuminate\Http\JsonResponse
 */
function successWithResponse($data, $code = 200)
{
    $data = [
        'status' => 'success',
        'data' => $data,
    ];
    return response()->json($data, $code);
}

/**
 * @param $message
 * @param int $code
 * @return \Illuminate\Http\JsonResponse
 */
function success($message, $code=200)
{
    $data = [
        'status' => 'success',
        'message' => $message,
    ];
    return response()->json($data, $code);
}

/**
 * @param $message
 * @param $code
 * @return \Illuminate\Http\JsonResponse
 */
function fail($message, $code)
{
    $data = [
        'status' => 'fail',
        'message' => $message,
    ];
    return response()->json($data, $code);
}

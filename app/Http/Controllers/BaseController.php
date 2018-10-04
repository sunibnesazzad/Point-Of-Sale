<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse( $message, $message1)
    {
        $response = [
            'code' => '200',
            'context' => 'products',
            'app_message' => $message,
            'user_message' => $message1,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendWrongError()
    {
        $response = [
            'code' => '500',
            'context' => 'login',
            'app_message' => 'xyz went wrong',
            'user_message' => 'Something went wrong!! Please try again.',
        ];

        return response()->json($response);
    }
    /**
     * return success response.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendSuccessResponse($result)
    {
        $response = [
            'success' => true,
            'data'    => $result,
        ];


        return response()->json($response, 200);
    }

}

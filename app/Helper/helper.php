<?php
// test helper function
if(!function_exists("test_helper")) {
    function test_helper() {
        return 'Hare Krishna';
    }
}

// my assets function
if(!function_exists("myAssets")) {
    function myAssets($path) {
        return asset($path);
    }
}

// get resJson function
if(!function_exists("resJson")) {
    function resJson($status = 'success', $message = '', $data = [], $redirectUrl = '') {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'redirect_url' => $redirectUrl
        ]);
    }
}
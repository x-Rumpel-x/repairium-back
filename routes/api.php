<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['db' => 'connected']);
    } catch (\Exception $e) {
        return response()->json([
            'db' => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
});

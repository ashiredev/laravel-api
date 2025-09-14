<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) ç
//    return $request->user();
//})->middleware('auth:sanctum');
//

Route::get('/', function (Request $request) {
    $action = $request->query('action');

    if (!$action) {
        return response()->json([
            'error' => 'Invalid action',
        ], 400);
    }

    switch ($action) {
        default: 
            return response()->json([
                'error' => 'Invalid action',
            ], 400);
        case 'reverse':
            $text = $request->query('text');
            $TextReversed = strrev($text);
            $TextLenght = strlen($text);
            return response()->json([
                'original' => $text,
                'reversed' => $TextReversed,
                'lenght' => $TextLenght,
        ]);
        case 'info':
            function isEven($number) {
                return ($number % 2 === 0);
            }
            function isPrime($number) {
            if ($number <= 1) {
                return false; 
            }
            if ($number <= 3) {
                return true; 
            }
            if ($number % 2 === 0 || $number % 3 === 0) {
                return false; 
            }
            for ($i = 5; $i * $i <= $number; $i += 6) {
                if ($number % $i === 0 || $number % ($i + 2) === 0) {
                    return false;
                }
            }
            return true;
        }
            $number = intval($request->query('number', 0));
            //$is_even = ($number % 2 === 0);
            $is_even = isEven($number);
            $is_prime = isPrime($number);
            $square = $number * $number;
            return response()->json([
                'number' => $number,
                'is_even' => $is_even,
                'is_prime' => $is_prime,
                'square' => $square,
            ]);
        }   
    }  
);
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function processTest(Request $request)
    {
        // Lấy giá trị của nút từ request
        $value = $request->input('box');

        // In giá trị ra console
        \Illuminate\Support\Facades\Log::info("Giá trị nhận được từ JavaScript: " . $value);

        // Trả về một phản hồi JSON nào đó
        return response()->json(['message' => 'success']);
    }
}

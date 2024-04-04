<?php

namespace App\Http\Controllers;

use App\Models\GameData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    public function getData()
    {
        return [
            'id' => 123,
            'name' => 'Kim'
        ];
    }

    public function storeData(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'prize' => 'required|string|max:255',
            'date_time' => 'required|date',
        ]);

        // Create new GameData instance and save to database
        $gameData = new GameData();
        $gameData->user_name = $validatedData['user_name'];
        $gameData->prize = $validatedData['prize'];
        $gameData->date_time = $validatedData['date_time'];
        $gameData->save();

        return response()->json(['message' => 'Game data saved successfully'], 200);
    }

    public function testApiTokenMiddleware()
    {
        // Sample JSON data to send
        $jsonData = [
            'user_name' => 'John Doe',
            'prize' => 'Gold Medal',
            'date_time' => '2023-12-10 14:30:00',
        ];

        // API token
        $apiToken = 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce';

        // Make a POST request with JSON data and API token header
        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiToken",
            'Content-Type' => 'application/json',
        ])->post(url('http://android-tv.test/api/save-data'), $jsonData);

        // Display the response
        dd($response->status(), $response->json());
    }
}

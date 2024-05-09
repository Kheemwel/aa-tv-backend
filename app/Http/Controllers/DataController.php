<?php

namespace App\Http\Controllers;

use App\Http\VideoStream;
use App\Models\Announcements;
use App\Models\Events;
use App\Models\GameData;
use App\Models\VideoCategories;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function getData()
    {
        return [
            'id' => 123,
            'name' => 'Kim'
        ];
    }

    public function viewImage($image, $token)
    {
        // Check if the token is valid
        if ($token !== 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce') {
            abort(403, 'Unauthorized');
        }

        $path = 'images/' . $image;

        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return Storage::response('private/'.$path);
    }

    public function viewVideo($video, $token)
    {
        // Check if the token is valid
        if ($token !== 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce') {
            abort(403, 'Unauthorized');
        }

        $path = 'videos/' . $video;

        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        $fileContents = Storage::disk('private')->get($path);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");

        return $response;
    }

    public function getAnnouncements()
    {
        return Announcements::latest()->get();
    }

    public function getEvents()
    {
        return Events::orderBy('event_start')->get();
    }

    public function getCategories()
    {
        return VideoCategories::select('id', 'category_name')->get();
    }

    public function getVideos()
    {
        $apiToken = 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce';
        $result = [];
        $videos = Videos::latest()->get();
        foreach ($videos as $key) {
            $result[] = [
                'id' => $key->id,
                'title' => $key->title,
                'description' => $key->description,
                'thumbnail_path' => url('api/'. $key->thumbnail_path . '/' . $apiToken),
                'video_path' => url('api/'. $key->video_path . '/' . $apiToken),
                'category' => $key->category_name,
                'created_at' => $key->created_at,
            ];
        }

        return $result;
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

    public function testGet()
    {
        // API token
        $apiToken = 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce';

        // Make a POST request with JSON data and API token header
        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiToken",
        ])->get(url('https://android-tv-test.loca.lt/api/get-announcements'));

        // Display the response
        return $response->json();
    }

    public function testVideos()
    {
        // API token
        $apiToken = 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce';

        // Make a POST request with JSON data and API token header
        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiToken",
        ])->get(url('https://android-tv-test.loca.lt/api/get-videos'));

        // Display the response
        return $response->json();
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
        ])->post(url('https://android-tv-test.loca.lt/api/save-data'), $jsonData);

        // Display the response
        dd($response->status(), $response->json());
    }
}

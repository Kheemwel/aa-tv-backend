<?php

namespace App\Http\Controllers;

use App\Http\Controllers\VideoStream;
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

        return Storage::response('private/' . $path);
    }

    public function viewVideo($video, $token, Request $request)
    {
        // Check if the token is valid
        if ($token !== 'e94061b3-bc9f-489d-99ce-ef9e8c9058ce') {
            abort(403, 'Unauthorized');
        }

        $filePath = 'private/videos/' . $video;

        if (!Storage::exists($filePath)) {
            abort(404);
        }

        $fileSize = Storage::size($filePath);
        $mimeType = Storage::mimeType($filePath);

        $headers = [
            'Content-Type' => $mimeType,
            'Content-Length' => $fileSize,
            'Accept-Ranges' => 'bytes',
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
        ];

        $stream = Storage::disk('local')->readStream($filePath);

        if ($request->headers->has('Range')) {
            $range = $request->header('Range');
            list(, $range) = explode('=', $range, 2);
            list($start, $end) = explode('-', $range, 2);

            $start = intval($start);
            $end = $end === '' ? $fileSize - 1 : intval($end);

            $length = $end - $start + 1;

            fseek($stream, $start);

            return response()->stream(function () use ($stream, $length) {
                echo fread($stream, $length);
                if (is_resource($stream)) {
                    fclose($stream);
                }
            }, 206, array_merge($headers, [
                'Content-Range' => "bytes $start-$end/$fileSize",
                'Content-Length' => $length,
            ]));
        } else {
            return response()->stream(function () use ($stream) {
                fpassthru($stream);
                if (is_resource($stream)) {
                    fclose($stream);
                }
            }, 200, $headers);
        }
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
                'thumbnail_path' => url('api/' . $key->thumbnail_path . '/' . $apiToken),
                'video_path' => url('api/' . $key->video_path . '/' . $apiToken),
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
            'username' => 'required|string|max:255',
            'game_name' => 'required|string|max:255',
            'description' => 'required|string|',
            'date_time' => 'required|date',
        ]);

        //Save the validated data to database
        GameData::create($validatedData);

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

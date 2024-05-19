<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Events;
use App\Models\GameData;
use App\Models\VideoCategories;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * This controller handle all the data request
 */
class DataController extends Controller
{

    /**
     * Handle requesting access to stored images
     */
    public function viewImage($image, $token)
    {
        // Check if the token is valid
        if ($token !== '199fed4b-966e-49c5-b19b-0ae361c14f29') {
            abort(403, 'Unauthorized');
        }

        $path = 'images/' . $image;

        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return Storage::response('private/' . $path);
    }

    /**
     * Handle requesting access to stored videos
     * Stream the videos as a response
     */
    public function viewVideo($video, $token, Request $request)
    {
        // Check if the token is valid
        if ($token !== 'fcf5346a-43fe-41ae-b181-f374bfc9e135') {
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

    /**
     * Fetch all announcements data
     */
    public function getAnnouncements()
    {
        return Announcements::latest()->get();
    }
    
    /**
     * Fetch all events data and order it by event start
     */
    public function getEvents()
    {
        return Events::orderBy('event_start')->get();
    }

    /**
     * Fetch all video categories data
     */
    public function getCategories()
    {
        return VideoCategories::select('id', 'category_name')->get();
    }

    /**
     * Fetch all videos data
     */
    public function getVideos()
    {
        $result = [];
        $videos = Videos::latest()->get();
        foreach ($videos as $key) {
            $result[] = [
                'id' => $key->id,
                'title' => $key->title,
                'description' => $key->description,
                'thumbnail_path' => $key->thumbnail_path,
                'video_path' => $key->video_path,
                'category' => $key->category_name,
                'created_at' => $key->created_at,
            ];
        }

        return $result;
    }

    /**
     * Store the sent game result from AA TV Flutter app
     */
    public function saveGameResult(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'game_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Add the current date_time to the validated data
        $validatedData['date_time'] = now();

        // Save the validated data to the database
        GameData::create($validatedData);

        return response()->json(['message' => 'Game data saved successfully'], 200);
    }
}

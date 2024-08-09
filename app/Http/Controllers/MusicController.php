<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use getID3;

class MusicController extends Controller
{
    public function index()
    {
        // Get the list of audio files from the public/audio directory
        $audioFiles = File::files(public_path('audio'));

        // Create an array to store track details
        $tracks = [];
        $getID3 = new getID3(); // Initialize getID3

        foreach ($audioFiles as $file) {
            $filePath = $file->getPathname();
            $fileInfo = $getID3->analyze($filePath);

            $duration = isset($fileInfo['playtime_string']) ? $fileInfo['playtime_string'] : '00:00';

            $tracks[] = [
                'title' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                'url' => asset('audio/' . $file->getFilename()),
                'duration' => $duration
            ];
        }

        return view('welcome', compact('tracks'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackgroundRemoveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackgroupRemoveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            
            $image = $request->file('image');
            // Generate a random name for the image
            $randomName = Str::random(20) . '.png';  // Generate a random 20-character string and append the .png extension

            // Define the storage directory (public path)
            $storageDirectory = public_path('storage/input_images');
            
            // Ensure the directory exists
            if (!file_exists($storageDirectory)) {
                mkdir($storageDirectory, 0777, true);  // Create directory if it doesn't exist
            }

            // Move the file to the desired path with the random name
            $image->move($storageDirectory, $randomName);

            $inputImagePath = public_path("storage/input_images/{$randomName}");
            $inputFolder = public_path('storage/input_images');
            $outputFolder = public_path('storage/converted_images');

            // Set up the paths
            $inputImagePath = escapeshellarg($inputImagePath);
            $inputFolder = escapeshellarg($inputFolder);
            $outputFolder = escapeshellarg($outputFolder);

            // Path to the shell script
            $shellScript = escapeshellarg(base_path('background-remove/run_remove_bg.sh'));

            // Build the shell command to execute the .sh script
            $command = "sh {$shellScript} {$inputImagePath} {$inputFolder} {$outputFolder}";

            // Execute the shell script command
            exec($command, $output, $status);
        
            // Check if the command was successful
            if ($status === 0) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Background removed successfully',
                    'output_image_url' => asset('storage/converted_images/output_' . basename($randomName))
                ]);
            } else {
                return response()->json(['error' => 'Background removal failed'], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

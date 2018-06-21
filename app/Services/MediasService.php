<?php

namespace App\Services;


use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class MediasService
{
    use ValidatesRequests;


    /**
     * Media validation.
     * @param Request $request
     */
    public function validation(Request $request) {
        $this->validate($request, [
            'file' => 'required'
        ]);
    }

    /**
     * Return a media.
     * @param Media $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media) {
        $path = storage_path('app/' . $media->file);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);

        return $response;
    }

    /**
     * Store a media.
     * @param Request $request
     * @return Media
     */
    public function store(Request $request) {
        $image = $request->file('file');
        $filename = Carbon::now()->timestamp . $image->getClientOriginalName();

        $path = storage_path('app/products/' . $filename);

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(200, 360);
        $image_resize->save($path);

        $media = Media::create([
            'file' => 'products/' . $filename
        ]);

        return $media;
    }

    /**
     * Delete a media.
     * @param Media $media
     * @throws \Exception
     */
    public function delete(Media $media) {
        $path = storage_path('app/' . $media->file);
        if (file_exists($path)) {
            File::delete($path);
        }

        try {
            $media->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
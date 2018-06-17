<?php

namespace App\Services;


use App\Media;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

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
     * @return Media
     */
    public function show(Media $media) {
        return $media;
    }

    /**
     * Store a media.
     * @param Request $request
     * @return Media
     */
    public function store(Request $request) {
        $media = Media::create([
            'file' => $request->get('file')
        ]);

        return $media;
    }

    /**
     * Update a media.
     * @param Media $media
     * @param Request $request
     * @return Media
     */
    public function update(Media $media, Request $request) {
        $media->update([
            'file' => $request->get('file')
        ]);

        return $media;
    }

    /**
     * Delete a media.
     * @param Media $media
     * @throws \Exception
     */
    public function delete(Media $media) {
        try {
            $media->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
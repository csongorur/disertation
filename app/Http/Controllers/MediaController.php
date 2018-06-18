<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Services\MediasService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    private $mediasService;

    /**
     * MediaController constructor.
     * @param $mediasService
     */
    public function __construct() {
        $this->mediasService = new MediasService();
    }


    public function show(Media $media) {
        return $this->mediasService->show($media);
    }
}

<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w;
    private $h;
    private $fileName;
    private $path;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $scrPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}_{$h}_" . $this->fileName;

        $croppedImage = Image::load($scrPath)
                        ->crop(Manipulations::CROP_CENTER, $w, $h)
                        ->watermark('public/img/header/logoprestoheader.png')
                        ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT)
                        ->watermarkHeight(200, Manipulations::UNIT_PIXELS)
                        ->watermarkWidth(200, Manipulations::UNIT_PIXELS)
                        ->save($destPath);
    }
}

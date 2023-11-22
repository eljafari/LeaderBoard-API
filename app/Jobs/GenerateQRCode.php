<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GenerateQRCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $filename;

    public function __construct($data)
    {
        $this->data = $data['address'];
        $this->filename = $data['id'] . '_qr.png';
    }


    public function handle(): void
    {
        info('This is handle.');

        // Make an API request to GoQR.me to generate the QR code.
        $response = Http::get('http://api.qrserver.com/v1/create-qr-code/?data=' . $this->data . '&size=100x100');

        if ($response->successful()) {
            $qrCodeData = $response->body();

            // Save the QR code image to local storage.
            Storage::put($this->filename, $qrCodeData);

            // Set the QR code path property.
            $qrCodePath = storage_path("app/{$this->filename}");
        } else {
            // Handle any errors here.
            throw new \Exception('Error generating QR code');
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getQrCode(?string $code): string
    {
        // Generate QR code tanpa style round untuk memastikan bisa di-scan
        $qrcode = "data:image/svg+xml;base64," . base64_encode(
            QrCode::size(300)
                ->margin(2)
                ->errorCorrection('M') // Medium error correction
                ->generate($code)
        );
        return $qrcode;
    }

    public function getQrCodeImage(?string $code): string
    {
        $qrcode = "data:image/png;base64," . base64_encode(QrCode::format('png')->size(300)->style('round')->generate($code));
        return $qrcode;
    }
}

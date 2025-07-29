<?php

namespace App\Http\Controllers;

class QrCodeImageHelper
{
    public static function convertSvgToPng($svgContent, $width = 300, $height = 300)
    {
        // Jika GD tersedia, coba convert SVG ke PNG
        if (!extension_loaded('gd')) {
            return null;
        }

        try {
            // Buat image canvas
            $image = imagecreatetruecolor($width, $height);

            // Set background putih
            $white = imagecolorallocate($image, 255, 255, 255);
            imagefill($image, 0, 0, $white);

            // Convert SVG ke PNG menggunakan GD
            // Ini adalah implementasi sederhana
            // Untuk implementasi yang lebih lengkap butuh library tambahan

            // Untuk sementara return null dan gunakan SVG
            imagedestroy($image);
            return null;

        } catch (\Exception $e) {
            return null;
        }
    }
}

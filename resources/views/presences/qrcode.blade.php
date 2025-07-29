@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3" style="max-width: min-content">
            <div class="card-body">
                <img src="{{ $qrcode }}" alt="" id="qrcode">
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route('presences.qrcode.download-pdf', ['code' => $code]) }}" class="btn btn-primary me-2">Download
                PDF</a>
            <a href="{{ route('presences.qrcode.download-image', ['code' => $code]) }}" class="btn btn-success"
               download="qrcode-{{ $code }}.png" target="_blank">Download Gambar PNG</a>
            <button onclick="downloadQrAsPng('{{ $code }}')" class="btn btn-info ms-2">Download PNG (Client)</button>
        </div>
        <div><small class="text-muted">
            <strong>Pilihan Download:</strong><br>
            • <strong>Download PDF</strong>: File PDF untuk printing<br>
            • <strong>Download Gambar PNG (server)</strong>: File SVG berkualitas tinggi (bisa di-scan)<br>
            • <strong>Download PNG (Client)</strong>: Convert ke PNG resolusi tinggi di browser (recommended untuk scanning)<br>
            • <strong>Klik kanan pada gambar</strong>: Save as SVG untuk editing<br><br>
            <em>💡 Tips: Untuk hasil scan terbaik, gunakan "Download PNG (Client)" dengan resolusi tinggi.</em>
        </small></div>
    </div>
</div>

<script>
function downloadQrAsPng(code) {
    const qrImg = document.getElementById('qrcode');
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');

    // Set higher resolution for better QR code quality
    const scale = 4; // 4x resolution for much better scanning
    canvas.width = 400 * scale;  // Larger size
    canvas.height = 400 * scale;

    // Disable image smoothing for crisp QR code
    ctx.imageSmoothingEnabled = false;
    ctx.msImageSmoothingEnabled = false;
    ctx.webkitImageSmoothingEnabled = false;
    ctx.mozImageSmoothingEnabled = false;

    // Fill with pure white background
    ctx.fillStyle = '#FFFFFF';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Create a new image element
    const img = new Image();
    img.crossOrigin = 'anonymous';

    img.onload = function() {
        try {
            // Draw the QR code image with higher resolution
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

            // Apply contrast enhancement for better scanning
            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const data = imageData.data;

            // Enhance contrast - make blacks blacker and whites whiter
            for (let i = 0; i < data.length; i += 4) {
                const avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
                const newValue = avg > 127 ? 255 : 0; // Binary threshold
                data[i] = newValue;     // Red
                data[i + 1] = newValue; // Green
                data[i + 2] = newValue; // Blue
                // Alpha stays the same (data[i + 3])
            }

            ctx.putImageData(imageData, 0, 0);

            // Convert to PNG with maximum quality
            canvas.toBlob(function(blob) {
                if (blob) {
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'qrcode-' + code + '.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                } else {
                    alert('Error creating PNG file. Please try the server download option.');
                }
            }, 'image/png', 1.0); // Maximum quality

        } catch (error) {
            console.error('Error processing QR code:', error);
            alert('Error processing QR code. Please try the server download option.');
        }
    };

    img.onerror = function() {
        alert('Error loading QR code image. Please try the server download option.');
    };

    // Load the QR code image
    img.src = qrImg.src;
}
</script>
@endsection

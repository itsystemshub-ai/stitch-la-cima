<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class StaticAssetController extends Controller
{
    /**
     * Sirve archivos estáticos desde el directorio de legado 'stitch'.
     *
     * @param string $path
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function serve(string $path)
    {
        // Sanitizar el path para prevenir path traversal
        $path = str_replace(['../', '..\\'], '', $path);

        $absolutePath = base_path('stitch/' . $path);

        // Seguridad extra: asegurar que el path real esté dentro del directorio stitch
        $realPath = realpath($absolutePath);
        $stitchDir = realpath(base_path('stitch'));

        if (!$realPath || !str_starts_with($realPath, $stitchDir) || !File::exists($realPath)) {
            abort(404);
        }

        $file = File::get($realPath);
        $type = $this->getMimeType($realPath);
        $lastModified = File::lastModified($realPath);
        $etag = md5_file($realPath);

        return Response::make($file, 200)
            ->header('Content-Type', $type)
            ->header('Cache-Control', 'max-age=31536000, public') // 1 año para assets estáticos
            ->header('Last-Modified', gmdate('D, d M Y H:i:s', $lastModified) . ' GMT')
            ->header('Etag', $etag);
    }

    /**
     * Obtiene el tipo MIME basado en la extensión, con fallbacks manuales.
     */
    private function getMimeType(string $path): string
    {
        if (str_ends_with($path, '.css')) {
            return 'text/css';
        }
        
        if (str_ends_with($path, '.js')) {
            return 'application/javascript';
        }
        
        if (str_ends_with($path, '.svg')) {
            return 'image/svg+xml';
        }

        return File::mimeType($path);
    }
}

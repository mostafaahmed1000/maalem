<?php

if (!function_exists('asset_v')) {
    /**
     * Generate an asset path with versioning based on file modification time.
     *
     * @param  string  $path
     * @return string
     */
    function asset_v(string $path): string
    {
        // Strip query strings or anchors to locate the actual file in the filesystem
        $cleanPath = parse_url($path, PHP_URL_PATH) ?? $path;
        $filePath = public_path($cleanPath);

        $version = file_exists($filePath) ? filemtime($filePath) : '1.0';

        $separator = str_contains($path, '?') ? '&' : '?';
        return asset($path) . $separator . 'v=' . $version;
    }
}

if (!function_exists('secure_asset_v')) {
    /**
     * Generate a secure asset path with versioning based on file modification time.
     *
     * @param  string  $path
     * @return string
     */
    function secure_asset_v(string $path): string
    {
        // Strip query strings or anchors to locate the actual file in the filesystem
        $cleanPath = parse_url($path, PHP_URL_PATH) ?? $path;
        $filePath = public_path($cleanPath);

        $version = file_exists($filePath) ? filemtime($filePath) : '1.0';

        $separator = str_contains($path, '?') ? '&' : '?';
        return app()->environment('local')
            ? asset($path) . $separator . 'v=' . $version
            : secure_asset($path) . $separator . 'v=' . $version;
        // return secure_asset($path) . $separator . 'v=' . $version;
    }
}
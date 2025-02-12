<?php

namespace App\Services\Directory;

class ResolvePathStorage
{
    public function __construct(private string $domain) {}

    public function getUrl(string $path): string
    {
        if ($this->containsHttp($path)) {
            return $path;
        }

        return $this->containsSlashToFirstLetter($path)
            ? sprintf("%s/storage%s", $this->domain, $path)
            : sprintf("%s/storage/%s", $this->domain, $path);
    }

    private function containsSlashToFirstLetter(string $path): bool
    {
        return $path[0] === '/';
    }

    private function containsHttp(string $path): bool
    {
        return str_contains('http', $path) || str_contains('https', $path);
    }
}

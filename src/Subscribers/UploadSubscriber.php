<?php

namespace Daun\StatamicOriginalFilename\Subscribers;

use Illuminate\Support\Str;
use Statamic\Assets\Asset;
use Statamic\Events\AssetReuploaded;
use Statamic\Events\AssetUploaded;

class UploadSubscriber
{
    public function subscribe(): array
    {
        return [
            AssetUploaded::class => 'upload',
            AssetReuploaded::class => 'reupload',
        ];
    }

    public function upload(AssetUploaded $event): void
    {
        $this->saveOriginalFilename($event->asset, $event->originalFilename ?? null);
    }

    public function reupload(AssetReuploaded $event): void
    {
        $this->saveOriginalFilename($event->asset, $event->originalFilename ?? null);
    }

    protected function saveOriginalFilename(Asset $asset, ?string $basename): void
    {
        if (! $basename) {
            return;
        }

        // Remove extension from filename
        $filename = Str::beforeLast($basename, ".{$asset->extension()}");

        // Persist to asset metadata
        $asset->set('original_filename', $filename);
        $asset->saveQuietly();
    }
}

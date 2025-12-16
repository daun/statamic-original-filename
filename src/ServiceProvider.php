<?php

namespace Daun\StatamicOriginalFilename;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $subscribe = [
        Subscribers\AssetUploadSubscriber::class,
    ];
}

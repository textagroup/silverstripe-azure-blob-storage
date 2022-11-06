<?php

namespace FullscreenInteractive\SilverStripe\AzureStorage\Adapter;

use League\Flysystem\Config;
use SilverStripe\Assets\Flysystem\PublicAdapter as SilverstripePublicAdapter;
use SilverStripe\Control\Controller;

class PublicAdapter extends AzureBlobStorageAdapter implements SilverstripePublicAdapter
{
    /**
     * @param string $path
     *
     * @return string
     */
    public function getPublicUrl($path): string
    {
        if ($meta = $this->getMetadata($path)) {
            return Controller::join_links($this->assetDomain, $meta['path']);
        }

        return '';
    }

    public function getVisibility($path): array
    {
        // Save an API call
        return [
            'path'       => $path,
            'visibility' => self::VISIBILITY_PUBLIC
        ];
    }

    public function update($path, $contents, Config $config)
    {
    }

    public function updateStream($path, $resource, Config $config)
    {
    }

    public function rename($path, $newpath)
    {
    }

    public function deleteDir($dirname)
    {
    }

    public function createDir($dirname, Config $config)
    {
    }

    public function has($path)
    {
    }

    public function getMetadata($path)
    {
    }

    public function getSize($path)
    {
    }

    public function getMimetype($path)
    {
    }

    public function getTimestamp($path)
    {
    }
}

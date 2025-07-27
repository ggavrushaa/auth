<?php

namespace App\Support\QrCode;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;

class QrCode
{
    private int $size = 400;
    public function __construct(
        private string $content,
    ) {
    }
    public function size(int $size): self
    {
        $this->size = $size;
        return $this;
    }
    public function svg()
    {
        $renderer = new ImageRenderer(
            new RendererStyle($this->size),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);
        return $writer->writeString($this->content);
    }
}
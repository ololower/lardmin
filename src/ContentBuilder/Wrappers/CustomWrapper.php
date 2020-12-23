<?php

namespace Ctrlv\Lardmin\ContentBuilder\Wrappers;

class CustomWrapper extends Wrapper
{
    private $open_tag;

    private $close_tag;

    public function __construct($open_tag, $close_tag)
    {
        $this->open_tag = $open_tag;
        $this->close_tag = $close_tag;
    }

    public function getOpenTag()
    {
        return $this->open_tag;
    }

    public function getCloseTag()
    {
        return $this->close_tag;
    }
}

<?php

namespace Ctrlv\Lardmin\ContentBuilder\Wrappers;

abstract class Wrapper {
    abstract public function getOpenTag();
    abstract public function getCloseTag();
}

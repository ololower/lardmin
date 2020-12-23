<?php

namespace Ctrlv\Lardmin\ContentBuilder\Presets\Traits;

use Ctrlv\Lardmin\ContentBuilder\Wrappers\Wrapper;

trait HasWrapper {

    public function addWrapper(Wrapper $wrapper) {
        $this->view_params['wrappers'][] = $wrapper;
    }
}

<?php

namespace Ctrlv\Lardmin\ModelMonitor;

use Ctrlv\Lardmin\ClientInterfaces\LardminList;
use Illuminate\Database\Eloquent\Model;

class ListModelMonitor extends ModelMonitor {

    protected function setLocalProperty(): void
    {
        if ($this->model instanceof LardminList) {
            $_props = collect(['id']);
            $this->property = $_props->merge($this->model->getListProps())->toArray();
        } else {
            $this->property = ['id']; // По умолчанию выводим только id
        }
    }

}

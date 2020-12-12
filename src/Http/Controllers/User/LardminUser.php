<?php

namespace Ctrlv\Lardmin\Http\Controllers\User;

use App\Models\User;
use Ctrlv\Lardmin\Http\Controllers\Lardmin;

class LardminUser extends Lardmin {

    public function __construct() {
        parent::__construct(User::class);
    }
}

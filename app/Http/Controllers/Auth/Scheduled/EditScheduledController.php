<?php

namespace App\Http\Controllers\Auth\Scheduled;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditScheduledController extends HomeScheduledController
{

    public function getCreatedScheduled(object $request):array
    {
        return $this->createScheduled($request);
    }

}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Jobs\ProcessPodcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PodCast;

class PodcastController extends Controller
{
    //
    public function store(Request $request)
    {
        $job = (new ProcessPodcast())
            ->delay(Carbon::now()->addMinutes(10));

        dispatch($job);
    }
}

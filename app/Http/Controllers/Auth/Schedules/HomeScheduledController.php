<?php

namespace App\Http\Controllers\Auth\Schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeScheduledController extends Controller
{

    public function createScheduled($scheduled =null): array
    {

        $scheduled = [
            'monday' => '00:00 - 00:00',
            'tuesday' => '00:00 - 00:00',
            'wednesday' => '00:00 - 00:00',
            'thursday' => '00:00 - 00:00',
            'friday' => '00:00 - 00:00',
            'saturday' => '00:00 - 00:00',
            'sunday' => '00:00 - 00:00',
        ];

        if (isset($scheduledModel->monday)) {
            $scheduled['monday'] = $scheduledModel->monday;
        }
        if (isset($scheduledModel->tuesday)) {
            $scheduled['tuesday'] = $scheduledModel->tuesday;
        }
        if (isset($scheduledModel->wednesday)) {
            $scheduled['wednesday'] = $scheduledModel->wednesday;
        }
        if (isset($scheduledModel->thursday)) {
            $scheduled['thursday'] = $scheduledModel->thursday;
        }
        if (isset($scheduledModel->friday)) {
            $scheduled['friday'] = $scheduledModel->friday;
        }
        if (isset($scheduledModel->saturday)) {
            $scheduled['saturday'] = $scheduledModel->saturday;
        }
        if (isset($scheduledModel->sunday)) {
            $scheduled['sunday'] = $scheduledModel->sunday;
        }

        return $scheduled;

    }

    public function prepareScheduled(array $scheduled): array
    {
        return [
            'monday' => "{$scheduled['monday']['from']['hour']}:{$scheduled['monday']['from']['minutes']} - {$scheduled['monday']['to']['hour']}:{$scheduled['monday']['to']['minutes']}",
            'tuesday' => "{$scheduled['tuesday']['from']['hour']}:{$scheduled['tuesday']['from']['minutes']} - {$scheduled['tuesday']['to']['hour']}:{$scheduled['tuesday']['to']['minutes']}",
            'wednesday' => "{$scheduled['wednesday']['from']['hour']}:{$scheduled['wednesday']['from']['minutes']} - {$scheduled['wednesday']['to']['hour']}:{$scheduled['wednesday']['to']['minutes']}",
            'thursday' => "{$scheduled['thursday']['from']['hour']}:{$scheduled['thursday']['from']['minutes']} - {$scheduled['thursday']['to']['hour']}:{$scheduled['thursday']['to']['minutes']}",
            'friday' => "{$scheduled['friday']['from']['hour']}:{$scheduled['friday']['from']['minutes']} - {$scheduled['friday']['to']['hour']}:{$scheduled['friday']['to']['minutes']}",
            'saturday' => "{$scheduled['saturday']['from']['hour']}:{$scheduled['saturday']['from']['minutes']} - {$scheduled['saturday']['to']['hour']}:{$scheduled['saturday']['to']['minutes']}",
            'sunday' => "{$scheduled['sunday']['from']['hour']}:{$scheduled['sunday']['from']['minutes']} - {$scheduled['sunday']['to']['hour']}:{$scheduled['sunday']['to']['minutes']}",
        ];
    }
}

<?php

namespace App\Http\Controllers\Auth\Schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeScheduledController extends Controller
{

    public function createScheduled($scheduledModel): array
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

    public function createScheduledFromArray(array $scheduled): array
    {
        return [
            'monday' => "{$scheduled['monday_from']} - {$scheduled['monday_to']}",
            'tuesday' => "{$scheduled['tuesday_from']} - {$scheduled['tuesday_to']}",
            'wednesday' => "{$scheduled['wednesday_from']} - {$scheduled['wednesday_to']}",
            'thursday' => "{$scheduled['thursday_from']} - {$scheduled['thursday_to']}",
            'friday' => "{$scheduled['friday_from']} - {$scheduled['friday_to']}",
            'saturday' => "{$scheduled['saturday_from']} - {$scheduled['saturday_to']}",
            'sunday' => "{$scheduled['sunday_from']} - {$scheduled['sunday_to']}",
        ];
    }
}

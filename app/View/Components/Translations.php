<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Translations extends Component
{
    public function render(): View
    {
        $locale = app()->getLocale();

        $translations = Cache::rememberForever("translations_$locale", function () use ($locale) {
            if (File::exists(base_path("lang/$locale.json"))) {
                return json_decode(File::get(base_path("lang/$locale.json")), true);
            }

            // If selected translation not exists, return EN (default)
            return json_decode(File::get(base_path("lang/en.json")), true);
        });

        return view('components.translations', compact('translations'));
    }
}

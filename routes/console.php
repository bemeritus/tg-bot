<?php

use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('tester', function() {
    $bot = TelegraphBot::find(2);

    dd($bot->registerCommands([
        'hello' => 'Welcome to our bot',
        'actions' => 'Different Games',
        'help' => 'How Can I help you',
    ])->send());
});

<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    public function hello(string $name): void
    {
        $this->reply("Hello! $name.");
    }

    public function help(): void
    {
        $this->reply('*HELLO.* How Can i help you?');
    }

    public function actions(): void
    {
        Telegraph::message('Choose destination')
            ->keyboard(
                Keyboard::make()->buttons([
                    Button::make('You Tube')->url('https://www.youtube.com'),
                    Button::make('Like')->action('like'),
                    Button::make('Subscribe')->action('subscribe'),
                ])
            )->send();
    }

    public function like(): void
    {
        $this->reply('👍');
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        if($text->value() == '/start'){
            $this->reply("Try another command");
        }else{
            $this->reply("Unknown command");
        }
    }
}

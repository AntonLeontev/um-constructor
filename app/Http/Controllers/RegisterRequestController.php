<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterRequestController extends Controller
{
    public function __invoke(Request $request)
    {
        $message = "
		Заявка c главной dnwb.pro:

		Имя: {$request->name}
		Почта: {$request->email}
		Telegram: {$request->telegram}
		";

        $token = config('services.telegram.auth_bot');
        $chat = config('services.telegram.auth_chat');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot{$token}/sendMessage");
        // curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot{$secret['telegram']['debug']['bot_token']}/sendMessage");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            http_build_query([
                'chat_id' => $chat,
                // 'chat_id' => $secret['telegram']['debug']['chat_id'],
                'text' => $message,
                'disable_web_page_preview' => true,
            ])
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        // Log::channel('telegram_auth')
        // 	->info($message);
    }
}

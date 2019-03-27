<?php

namespace App\Listeners;

use GuzzleHttp\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FindFavStreamerListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event and search the stream
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $client = new Client();
        $clientId = env("TWITCH_KEY");
        $limit = 10;
        $query = $event->query;
        $result  =$client->get(
            'https://api.twitch.tv/kraken/search/streams?query='.$query.'&limit='.$limit, [
            'headers' => [
                'Accept' => 'application/json',
                'Client-ID'      => $clientId
            ],
        ]);

        $contents = $result->getBody()->getContents();
        return json_decode($contents,true);
    }
}

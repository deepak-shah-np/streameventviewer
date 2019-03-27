<?php

namespace App\Http\Controllers;

use App\Events\FindFavStreamer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use romanzipp\Twitch\Twitch;

class StreamerController extends Controller
{
    /**
     * @var Twitch
     */
    public $twitch;

    /**
     * StreamerController constructor.
     * @param Twitch $twitch
     */
    public function __construct(Twitch $twitch)
    {
        $this->middleware('auth');
        $this->twitch = $twitch;
    }

    /**
     * Get all follows stream and search the stream
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request){
        $authuser = Auth::user();
        $results =   $results = $this->twitch->getFollows($authuser->user_id);
        $query=$request->get('q','');
        if (!empty($query)) {
            $results = event(new FindFavStreamer($query));
            $results =$results[0]["streams"];
        }
        return view('home',compact('results','query'));

    }

    /**
     * 10 most recent videos of a given streamer
     * @param $streamid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function streamDetail($streamid){
        $pagination=[
            "first"=>10
        ];
        $response = $this->twitch->getVideosByUser($streamid,$pagination);
        $streamerName = $response->data[0]->user_name;
        return view('stream',compact('response','streamerName'));

    }
}

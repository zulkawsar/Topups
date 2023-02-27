<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Topup;
use App\Jobs\TopupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\TopTopupService;

class TopupUserController extends Controller
{
    public $topTopupService; 

    public function __construct()
    {
        $this->topTopupService = new TopTopupService();
    }

    
    /**
     * despatch queue for save the topups user
     *
     * @return Void
     */
    public function topTopup()
    {
        $date = request()->date ?? Carbon::now();
        TopupUser::dispatch($date);
        
        alert()->success('Success')->showConfirmButton(
            '<a class="btn btn-primary" href="'.route('top.users').'">Close</a>',
        )->autoClose(false);
        return redirect()->route('top.users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveTopup($date)
    {
        $topups = Topup::whereDate('created_at',Carbon::parse($date)->format('Y-m-d'))->select('user_id', DB::raw('count(id) as count'))
        ->groupBy('user_id')
        ->take(10)->get()->toArray();

        $this->topTopupService->delete();
        if ($topups) {
            $this->topTopupService->save($topups);
        }
        
    }
}

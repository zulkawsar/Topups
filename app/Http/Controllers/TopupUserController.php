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
    public function topTopup(Request $request)
    {
        // dd(app());
        $date = $request->date ?? Carbon::now();
        TopupUser::dispatch($date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveTopup($date)
    {
        $topups = Topup::whereDate('created_at',Carbon::parse($date)->subDay(1)->format('Y-m-d'))->select('user_id', DB::raw('count(id) as count'))
        ->groupBy('user_id')
        ->take(10)->get()->toArray();

        if ($topups) {
            $this->topTopupService->delete();
            $this->topTopupService->save($topups);
            \Log::info('Success');
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

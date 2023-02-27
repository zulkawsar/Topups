<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\TopTopupUserDatatable;

class TopTopupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TopTopupUserDatatable $dataTable)
    {
        $PredataTable   = $dataTable->html();
        if($request->ajax()){
            return $dataTable->render(true);
        }
        return view('TopUser.index',compact('PredataTable'));

    }


}

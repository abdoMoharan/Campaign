<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaign = Campaign::get();
        $array = [
            'data' => $campaign,
            'message' => 'all Data',
            'status' => 200
        ];
        return response($array);
    }

    public function show($id){
        $campaign = Campaign::findOrFail($id);

        $array = [
            'data' => $campaign,
            'message' => 'show one Row',
            'status' => 200
        ];
        return response($array);
    }

    public function store(Request $request){

        $campaign = Campaign::create($request->all());
        if($campaign){
            $array = [
                'data' => $campaign,
                'message' => 'Creaded Campiagns',
                'status' => 201
            ];

            return response($array);
        }else{

            $array = [
                'data' => $campaign,
                'message' => 'Erorr Not Create',
                'status' => 404
            ];

            return response($array);
        }
    }
}

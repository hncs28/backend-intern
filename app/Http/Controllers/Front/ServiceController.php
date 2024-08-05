<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Front\services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = services::get(['serviceName','price','serviceImage','serviceID']);
        return response()->json($services);
    }
    
    public function show($serviceID)
    {
       $service = services::where('serviceID','=',$serviceID)->get(['serviceName','price','detail','Time','serviceImage'])->toArray();
       return response()->json($service);
   
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assets;
use App\Models\AssetType;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['assets'] = Assets::where("is_active",true)->get();
        $data['assetType'] = assetType::all();
        $data['assetInActive'] = Assets::where('is_active',false)->get();
        return view('admin/dashboard',$data);
    }
}

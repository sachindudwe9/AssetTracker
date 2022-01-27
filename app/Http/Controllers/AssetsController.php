<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\AssetType;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
   
    public function index()
    {
        $data['title'] = "Manage Assets";
        $data['assets'] = Assets::paginate(8);
        $data['assetType'] = assetType::all();
        return view('assets.manage',$data);
    }

    // public function inactive(){
    //     $data['title'] = "Manage Deactivated Assets";
    //     $data['assets'] = Assets::where("is_active",false)->paginate(8);
    //     $data['assetType'] = assetType::all();
    //     return view('assets.manage',$data);
    // }
    public function create()
    {
        $data['assetType'] = AssetType::all();
        return view('assets.add',$data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'asset_name' => 'required',
            'asset_types_id' => 'required',
            'asset_code' => 'required',
        ]);

        Assets::create($data);
        return redirect()->route('asset.index');
    }


   
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'asset_name' => 'required',
            'asset_types_id' => 'required',
        ]);

        $assets = Assets::find($id);
        $assets->asset_name = $request->asset_name;
        $assets->asset_types_id = $request->asset_types_id;
        $assets->save();
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $data = Assets::find($id);
        $data->delete();        
        return redirect()->route('asset.index');
    }

    public function in_active($id){
        $data = Assets::findOrFail($id);

        $data->is_active = false;
        $data->save();

        return redirect()->back();
    }
    public function active($id){
        $data = Assets::findOrFail($id);

        $data->is_active = true;
        $data->save();

        return redirect()->back();
    }
}

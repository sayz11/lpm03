<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equip;
use File;
use Storage;

class EquipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    { 
        if($request->keyword){
            $user = auth()->user();
            $equips = $user->equips()
                            ->where('alat','LIKE','%'.$request->keyword.'%')
                            ->paginate(3);
        }else{
            $user = auth()->user();
            $equips = $user->equips()->paginate(3);
        }
       

       // return to view - resources/views/equips/index.blade.php
       return view('equips.index', compact('equips'));
    }
        //query list of equips from db
        //$equips = Equip::all(); - show all equips from all user
        //$equips = Equip::paginate(3);
        //yang bawah ni untuk user yang tengah login sahaja
       
        
      // dd($user); untuk tengok user yang tengah online
    public function create()
    {
        //show create form
        return view('equips.create');

    }

    public function store(Request $request)
    {
        //store equips table using model
        $equip = new Equip();
        $equip->alat = $request->alat;
        $equip->description= $request->description;
        $equip->user_id = auth()->user()->id;
        $equip->save();

        if($request->hasFile('attachment')){
            //rename
            $filename = $equip->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension(); 

            //store at file storage
            Storage::disk('public')->put($filename,File::get($request->attachment));

            //update row on db
              $equip->attachment = $filename;
              $equip->save();

        }  

        //return equips index
        return redirect()->to('/equips')->with([
            'type' => 'alert-primary',
            'message' => 'Tahniah, anda berjaya simpan equip baharu!'
        ]);
    }
    public function show(Equip $equip)
    {
        return view('equips.show', compact('equip'));

    }
    public function edit(Equip $equip)
    {
        return view('equips.edit', compact ('equip'));
    }
    
    public function update(Equip $equip, Request $request)
    {
        $equip->alat = $request->alat;
        $equip->description= $request->description;
        $equip->save();

        return redirect()->to('/equips')->with([
            'type' => 'alert-success',
            'message' => 'Tahniah, anda berjaya ubah equipment!'
        ]);
    }
    
    public function delete(Equip $equip)
    {
        // delete attachment kalau ada
        if($equip->attachment){
            Storage::disk('public')->delete($equip->attachment);
        }
       // delete from table using model
       $equip->delete();

       // return to equips index
       return redirect()->to('/equips')->with([
        'type' => 'alert-danger',
        'message' => 'Anda telah padam equip!'
        ]);
    }
}




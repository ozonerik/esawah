<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pawongan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PawonganController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function pawongan($id, Pawongan $pawongan)
    {
        //config menu navigator
        $menuname="Pawongan,Daftar Pawongan";
        $sidemenu=['menu-pawongan'=>'menu-open','menu-daftar-pawongan'=>'active'];
        $m=explode(",",$menuname);
        $headmenu="Daftar Pawongan";
        $navigator="
        <li class='breadcrumb-item'><a href='#'><i class='fas fa-user-tie'></i> ".$m[0]."</a></li>
        <li class='breadcrumb-item active'>".$m[1]."</li>";
        //end config menu navigator
        $decriptid=Crypt::decryptString($id);
        $data=$pawongan->where('user_id',$decriptid)->get();
        return view('pawongan',compact('data','navigator','menuname','sidemenu','headmenu'));
    }
    
    protected function delpawongan(Request $request, Pawongan $pawongan)
    {
        $ids=explode(',',$request->input('ids'));
        $data=$pawongan->whereIn('id',$ids)->delete();
        //print_r($data->toArray());
        //print_r(Auth::user()->id);
        return redirect()->route('pawongan',Crypt::encryptString(Auth::user()->id))->with('success', 'Data berhasil dihapus');
    }
    
    protected function delsinglepawongan(Request $request, Pawongan $pawongan)
    {
        $data=$pawongan->find($request->idsingle)->delete();
        //print_r($ids);
        return redirect()->route('pawongan',Crypt::encryptString(Auth::user()->id))->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;

class OptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    //menu userlist
    public function userlist(User $user)
    {
        //config menu navigator
        $menuname="Options,Users";
        $sidemenu=['menu-options'=>'menu-open','menu-userlist'=>'active'];
        $m=explode(",",$menuname);
        $headmenu="Daftar User";
        $navigator="
        <li class='breadcrumb-item'><a href='#'><i class='fas fa-cog'></i> ".$m[0]."</a></li>
        <li class='breadcrumb-item active'>".$m[1]."</li>";
        //end config menu navigator
        $result=$user->get();
        return view('userlist',compact('result','navigator','menuname','sidemenu','headmenu'));
    }
    
    protected function deluser(Request $request, User $users)
    {
        $ids=explode(',',$request->input('ids'));
        $data=$users->whereIn('id',$ids)->delete();
        //print_r($ids);
        return redirect()->route('userlist')->with('success', 'Data berhasil dihapus');
    }
    
    protected function upguser(Request $request, User $users)
    {
        $ids=explode(',',$request->input('ids'));
        $result=$users->whereIn('id',$ids)
        ->update(
        [
        'role' => "pro",
        'request_code' => null,
        'user_expired' => Carbon::now()->addMonths(12)->format('Y-m-d'),
        ]
        );
        print_r($users->whereIn('id',$ids)->get()->toArray());
        return redirect()->route('userlist')->with('success', 'Data berhasil diupgrade');
    }
    
    protected function delsingleuser(Request $request, User $user)
    {
        $ids=explode(',',$request->input('idsingle'));
        $data=$user->whereIn('id',$ids)->delete();
        //print_r($ids);
        return redirect()->route('userlist');
    }
    
    protected function updatesingleuser(Request $request, User $user)
    {
        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users','username')->ignore($request->idsingle) ],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($request->idsingle) ],
            'userrole' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
          return back()
                 ->withErrors($validator);
        };
    
            
        
        $result=$user->find($request->idsingle);
        //update
        $result->name = $request->name;
        $result->username = $request->username;
        $oldemail = $result->email;
        $newemail = $request->email;
        $result->email = $newemail;
        $result->role = $request->userrole;
        $result->save();
        if ($oldemail !== $newemail){
            $result->email_verified_at = NULL;
            $result->save();
            $result->sendEmailVerificationNotification();
            return redirect('userlist')->with('success', 'Profile berhasil di update, Silahkan verifikasi email baru anda');
        }else{
            return redirect()->route('userlist')
            ->with('success', 'Profile berhasil di update');
        };

    }
    //end menu userlist
    
    //menu myprofil
    public function myprofile($id, User $user)
    {
        //config menu navigator
        $menuname="Options,My Profile";
        $sidemenu=['menu-options'=>'menu-open','menu-myprofile'=>'active'];
        $m=explode(",",$menuname);
        $headmenu="My Profile";
        $navigator="
        <li class='breadcrumb-item'><a href='#'><i class='fas fa-cog'></i> ".$m[0]."</a></li>
        <li class='breadcrumb-item active'>".$m[1]."</li>";
        //end config menu navigator
        $decriptid=Crypt::decryptString($id);
        $result=$user->find($decriptid);
        //print_r($result->toArray());
        return view('myprofile',compact('result','navigator','menuname','sidemenu','headmenu'));
    }
    //end menu myprofile
    
    //update user
    protected function updateprofile(Request $request, User $user, $id)
    {
        $decriptid=Crypt::decryptString($id);
        //print_r($request->all());
        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users','username')->ignore($decriptid) ],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($decriptid) ],
            'current-password' => ['required', new MatchOldPassword],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
          return back()
                 ->withErrors($validator);
        };
    
            
        
        $result=$user->find($decriptid);
        //update
        $result->name = $request->name;
        $result->username = $request->username;
        $oldemail = $result->email;
        $newemail = $request->email;
        $result->email = $newemail;
        $result->password = Hash::make($request->password);
        $result->save();
        if ($oldemail !== $newemail){
            $result->email_verified_at = NULL;
            $result->save();
            $result->sendEmailVerificationNotification();
            return redirect('home')->with('success', 'Profile berhasil di update, Silahkan verifikasi email baru anda');
        }else{
            return redirect()->route('myprofile',Crypt::encryptString($result->id))
            ->with('success', 'Profile berhasil di update');
        }
        
    }
    //end update//
    
    //menu upgrade
    public function upgradeprofile($id, User $user)
    {
        $decriptid=Crypt::decryptString($id);
        $result=$user->find($decriptid);
        //update
        $result->request_code = req_code();
        $result->save();
        //print_r($result->toArray());
        return redirect()->route('myprofile',Crypt::encryptString($result->id))
            ->with('success', 'Permintaan Upgrade telah dikirim');
    }
    
    //menu upgrade
    public function cancelupgradeprofile($id, User $user)
    {
        $decriptid=Crypt::decryptString($id);
        $result=$user->find($decriptid);
        //update
        $result->request_code = null;
        $result->save();
        //print_r($result->toArray());
        return redirect()->route('myprofile',Crypt::encryptString($result->id))
            ->with('success', 'Permintaan Upgrade telah dibatalkan');
    }
    
}

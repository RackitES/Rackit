<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DefinicoesController extends Controller
{
    public function index(){
        return view ('definicoes.definicoes');
    }

     
    public function update(Request $request)
    {       
        $userid = Auth::user()->id;
        // $userPassword = DB::select('select password from users where users.id=?', [$userid] );
        $user=User::find($userid);
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);

        // if (!Hash::check($request->current_password, $user)) {
        //     return back()->withErrors(['current_password'=>'Palavra-Passe não coincide.']);
        // }

        $request->password = Hash::make($request->password);
        $user->password=$request->password;
        $user->save();
        return redirect()->route('home')->with('success', 'Palavra-Passe alterada com sucesso.');
    }
    
    public function showedit(){
        
        return view('definicoes.edit');
    }
}


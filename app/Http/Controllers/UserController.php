<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users=User::orderBy('created_at','desc')->get();
        return view('panel.pages.user.list',compact('users'));
    }

    public function form($lang=null,$id=null)
    {
        if($id==null)
        {
            return view('panel.pages.user.form');
        }else
        {
            $user=User::where('id',$id)->first();
            if(auth()->user()->role !='super-admin'){
                $user=User::where('id',auth()->user()->id)->first();
                return view('panel.pages.user.form',compact('user'));
            }
            return view('panel.pages.user.form',compact('user'));

        }
    }

    public function saveForm(UserSaveRequest $request)
    {
        $params = [
            'name'  => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt( $request->password ),
            'email_verified_at' => Carbon::now(),
            'remember_token' => $request->_token,
        ];

        if($request->id==null)
        {
            $user=new User();
            $user->create($params);
        }
        else
        {
            $user=User::findOrFail($request->id);
            $user->update($params);
        }
        return redirect()->route('user.list');
    }

    public function delete(Request $request)
    {
        $exits = User::find((int)$request->post('id'));

		if(!is_null($exits))
		{
			$obj = User::find($exits->id);
			$obj->delete();
		} else {
			return response()->json(['status' => false, 'message' => 'Kayıt bulunamadı']);
		}

		return response()->json(['status' => true,'message'=>'Silme işlemi gerçekleşti']);
    }
}

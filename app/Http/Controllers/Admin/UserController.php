<?php

namespace App\Http\Controllers\Admin;

use App\Mail\RegistrationEmail;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\User;
use App\Role;
use Cart;

class UserController extends Controller
{

    public function adminHome()
    {
        return view('admin.index');
    }

    public function gatAll()
    {
        User::paginate();
        $users = User::all();
        //$users = User::with('roles')->get();
        return view('admin.user.all', compact('users'));
    }

    public function add()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function create(AdminRequest $request)
    {
        $data = $request->all();
        //var_dump($data); 
        if (isset($data['picture']) && ($data['picture'] != "")) {
            $data['picture'] = $data['picture'];
        } else {
            $data['picture'] = "";
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'picture' => $data['picture'],
            'status' => $data['status']
        ]);
        $role_user = Role::where('id', $data['rule'])->first();
        $user->roles()->attach($role_user);
        return redirect()->route('user.all');
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->get();
        $roles = Role::all();
        return view('admin.user.edit')
            ->with('users', $users)
            ->with('roles', $roles);
    }

    public function update(AdminUpRequest $request)
    {
        $data = $request->all();
        if ($data['userId']) {
            $user = User::find($data['userId']);
            if ($user) {
                if (isset($data['password']) && ($data['password'] != "")) {
                    $data['password'] = bcrypt($data['password']);
                } else {
                    $data['password'] = $user->password;
                }
                $user->name = $data['name'];
                $user->password = $data['password'];
                $user->mobile = $data['mobile'];
                $user->address = $data['address'];
                $user->picture = $data['picture'] != "" ? $data['picture'] : "";
                $user->status = $data['status'];
                $user->save();
                $user->roles()->detach();
                $role_user = Role::where('id', $data['rule'])->first();
                $user->roles()->attach($role_user);
                return redirect()->route('user.all');
            }
        } else {
            return redirect()->route('user.all');
        }
    }

    public function delete($id)
    {

        $user = User::where('id', $id)->first();
        if ($user) {
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('user.all');
        } else {
            return redirect()->route('user.all');
        }
    }

    public function userProfile()
    {
        return view('front.profile');
    }

    public function editProfile()
    {
        return view('front.editprofile');
    }

    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'mobile' => 'required|max:190',
            'address' => 'required|max:190'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('edit.profile')
                ->withErrors($validator)
                ->withInput();
        } else {
            $userId = $user = Auth::user()->id;
            $user = User::find($userId);
            if ($user) {
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
//                $user->mobile_opt = $data['mobile_opt'];
                $user->address = $data['address'];
                $user->picture = $data['picture'] != "" ? $data['picture'] : "";
                //$user->status    = $data['status'];
                $user->save();
                return redirect()->route('user.profile');
            }
        }
        //return redirect()->route('user.all');
    }

    public function changePassword()
    {
        return view('front.changepassword');
    }

    public function updatePassword(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('change.password')
                ->withErrors($validator)
                ->withInput();
        } else {
            $userId = $user = Auth::user()->id;
            $user = User::find($userId);

            if (!Hash::check($data['current_password'], $user->password)) {
                return redirect()
                    ->back()
                    ->with('error', 'The specified password does not match the database password');
            } else {
                if ($user) {
                    $user->password = bcrypt($data['new_password']);
                    $user->save();
                    return redirect()->route('user.profile');
                }
            }
        }
        return redirect()->route('change.password');
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $s_user = Socialite::driver('facebook')->user();

        // All Providers
        //token,id,name,email,avatar,avatar_original,gender
        $id = $s_user->getId();
        $name = $s_user->getName();
        $email = $s_user->getEmail();
        $picture = $s_user->getAvatar();

        if (isset($email)) {
            $user_temp = User::where('email', $email)->first();
            if ($user_temp) {
                Auth::login($user_temp);
                Cart::clearCartConditions();
                Cart::clear();
                return redirect()->route('front.home');
            } else {
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt("#$@^*" . $id . "*%$#" . rand(100, 999) . "*&^%$"),
                    'status' => '1'
                ]);

                $role_user = Role::where('name', 'User')->first();
                $user->roles()->attach($role_user);
                if ($user) {
                    Mail::to($user->email)->send(new RegistrationEmail($user));
                    Auth::login($user);
                    Cart::clearCartConditions();
                    Cart::clear();
                    return redirect()->route('front.home');
                }
                return redirect()->route('front.home');
            }
        } else {
            $err_msg = "Your Account at facebook cannot be registered - missing parameter email.";
            return view('front.register')->with('error_msg', $err_msg);
        }
    }
}

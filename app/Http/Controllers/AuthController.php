<?php


namespace App\Http\Controllers;


use App\Http\Controllers\common\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController {

    public function doLoginPost(Request $request) {
        /* @var $user User */
        $user = (new User())->where('name', $request->get('username'))->first();
        if (!$user) {
            return redirect()->route('register');
        }

        if (!Hash::check($request->get('password'), $user->password)) {
            return redirect()->route('login');
        }

        Auth::login($user, true);
        return redirect()->route('home');
    }

    public function doRegisterPost(Request $request) {
        /* @var $user User */
        $user = (new User())->where('name', $request->get('username'))->first();
        if ($user) {
            return redirect()->route('login');
        }

        // @todo 密码验证

        $user = new User();
        $user->name = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('login');
    }

    public function doLogout() {
        Auth::logout();

        return redirect()->route('home');
    }

}

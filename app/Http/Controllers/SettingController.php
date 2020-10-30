<?php


namespace App\Http\Controllers;


use App\Http\Controllers\common\BaseController;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;


class SettingController extends BaseController {
    public function settings_page() {
        return view('settings');
    }

    public function personal_access_tokens_page() {
        $tokens = Token::where('user_id', Auth::id())->get();
        return view('settings_tokens', ['tokens' => $tokens]);
    }

    public function generate_personal_access_token_page() {
        return view('settings_tokens_new');
    }

    public function generate_personal_access_token_post(Request $request) {
        $token = new Token();
        $token->user_id = Auth::id();
        $token->name = $request->post('name');
        $token->token = Uuid::uuid4()->toString();
        $token->save();
        return redirect()->route('tokens');
    }
}

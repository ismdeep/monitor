<?php


namespace App\Http\Controllers;


use App\Http\Controllers\common\BaseController;
use App\Models\Status;
use App\Models\Token;
use Illuminate\Http\Request;

class StatusAPIController extends BaseController {
    public function update_status(Request $request) {
        // 1. 验证 token
        /* @var $token Token */
        $token = Token::where('token', $request->get('token'))->first();
        if (!$token) {
            return response()->json(['code' => 404, 'msg' => 'Invalid token']);
        }

        /* @var $status Status */
        $status = Status::where(['user_id' => $token->user_id, 'key_name' => $request->get('key')])->first();
        if (!$status) {
            $status = new Status();
            $status->user_id = $token->user_id;
            $status->type = 0;
            $status->key_name = $request->get('key');
        }

        $status->value = $request->get('value');
        $status->updated_at = now();
        $status->save();

        return response()->json([
            'code' => 0,
            'msg' => 'Status UPDATED',
            'data' => $status
        ]);
    }
}

<?php


namespace App\Http\Controllers;


use App\Http\Controllers\common\BaseController;
use App\Models\Status;
use App\Models\Token;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusAPIController extends BaseController {

    /**
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update_status(Request $request) {
        // 1. 验证 token
        /* @var $token Token */
        $token = Token::where('token', $request->post('token'))->first();
        if (!$token) {
            return response()->json(['code' => 404, 'msg' => 'Invalid token']);
        }

        if (!$request->post('key')) {
            return response()->json(['code' => 404, 'msg' => 'Invalid Parameters']);
        }

        if (!$request->post('value')) {
            return response()->json(['code' => 404, 'msg' => 'Invalid Parameters']);
        }

        /* @var $status Status */
        $status = Status::where(['user_id' => $token->user_id, 'key_name' => $request->post('key')])->first();
        if (!$status) {
            $status = new Status();
            $status->user_id = $token->user_id;
            $status->type = 0;
            $status->key_name = $request->post('key');
        }
        if ($status->deleted == true) {
            $status->deleted = false;
        }
        $status->value = $request->post('value');
        $status->updated_at = now();
        $status->save();

        return response()->json([
            'code' => 0,
            'msg' => 'Status UPDATED',
            'data' => $status
        ]);
    }

    /**
     * @param Request $request
     */
    public function get_status_list(Request $request) {
        // 1. 验证 token
        /* @var $token Token */
        $token = Token::where('token', $request->post('token'))->first();
        if (!$token) {
            return response()->json(['code' => 404, 'msg' => 'Invalid token']);
        }

        $user_id = $token->user_id;

        $status_list_raw = Status::where(['user_id' => $user_id, 'deleted' => 0])->get();
        $status_list = [];
        foreach ($status_list_raw as $status) {
            /* @var $status Status */
            $status_list [] = [
                'id' => $status->id,
                'key' => $status->key_name,
                'is_alive' => $status->isAlive(),
                'ago_text' => $status->getAgoInfo(),
                'value' => $status->getValue()
            ];
        }

        $result_status_list = [];
        foreach ($status_list as $status) {
            if (!$status['is_alive']) {
                $result_status_list []= $status;
            }
        }

        foreach ($status_list as $status) {
            if ($status['is_alive']) {
                $result_status_list []= $status;
            }
        }

        return response()->json([
            'code' => 0,
            'status_list' => $result_status_list
        ]);
    }
}

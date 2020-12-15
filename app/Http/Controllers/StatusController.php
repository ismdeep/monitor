<?php


namespace App\Http\Controllers;


use App\Http\Controllers\common\BaseController;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StatusController extends BaseController {

    /**
     * Get status list page
     */
    public function homePage() {
        return view('status');
    }

    public function statusListPart() {
        $status_list_raw = Status::where(['user_id' => Auth::id(), 'deleted' => 0])->get();
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

        return view('status_list_part', ['status_list' => $status_list]);
    }

    /**
     * 删除
     * @param int $id
     *
     * @return JsonResponse
     */
    public function delete_status(int $id) {
        /* @var $status Status */
        $status = Status::where(['user_id' => Auth::id(), 'id' => $id])->first();
        if (!$status) {
            return response()->json(['code' => 404, 'msg' => ERR_NOT_FOUND]);
        }

        if ($status->user_id != Auth::id()) {
            return response()->json(['code' => 500, 'msg' => ERR_ACCESS_DENIED]);
        }

        if ($status->deleted) {
            return response()->json(['code' => 500, 'msg' => ERR_DELETED]);
        }

        $status->deleted = true;
        $status->save();

        return response()->json(['code' => 0]);
    }

    /**
     * Get status detail page
     *
     * @param int $id
     */
    public function status_detail(int $id) {
        /* @var $status Status */
        $status = Status::where(['user_id' => Auth::id(), 'id' => $id])->first();

        if ($status->user_id != Auth::id()) {
            return redirect('/status');
        }

        if ($status->deleted) {
            return redirect('/status');
        }

        return view('status_detail', ['status' => $status]);
    }
}

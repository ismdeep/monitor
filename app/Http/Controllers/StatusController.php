<?php


namespace App\Http\Controllers;


use App\Http\Controllers\common\BaseController;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class StatusController extends BaseController {

    /**
     * Get status list page
     */
    public function homePage() {
        return view('status');
    }

    /**
     * Get status list json
     */
    public function status_json() {
        $status_list = Status::where('user_id', Auth::id())->get();
        $data = [];
        foreach ($status_list as $status) {
            /* @var $status Status */
            $data [] = [
                'id' => $status->id,
                'key' => $status->key_name,
                'is_alive' => $status->isAlive(),
                'ago_text' => $status->getAgoInfo(),
                'value' => $status->getValue()
            ];
        }
        return response()->json([
            'code' => 0,
            'data' => $data
        ]);
    }

    /**
     * Get status detail page
     *
     * @param int $id
     */
    public function status_detail(int $id) {
        $status = Status::where(['user_id' => Auth::id(), 'id' => $id])->first();
        return view('status_detail', ['status' => $status]);
    }
}

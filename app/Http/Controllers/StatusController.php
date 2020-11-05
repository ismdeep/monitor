<?php


namespace App\Http\Controllers;


use App\Http\Controllers\common\BaseController;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StatusController extends BaseController {

    public static function human_ago($interval_second) {
        if ($interval_second < 60) {
            return "{$interval_second} seconds ago";
        }

        $interval_second = intval($interval_second / 60);
        if ($interval_second < 60) {
            return "{$interval_second} minutes ago";
        }

        $interval_second = intval($interval_second / 60);
        if ($interval_second < 60) {
            return "{$interval_second} hours ago";
        }

        $interval_second = intval($interval_second / 24);
        return "{$interval_second} days ago";
    }

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
            $data []= [
                'id' => $status->id,
                'key' => $status->key_name,
                'is_alive' => $status->isAlive(),
                'ago_text' => StatusController::human_ago(time() - $status->updated_at->getTimestamp()),
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

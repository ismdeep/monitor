<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package App\Models
 *
 * @property int id
 * @property int user_id
 * @property int type
 * @property string key_name
 * @property string value
 * @property string description
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class Status extends Model {
    protected $table = 'status';

    const TYPE_BOOLEAN = 0;
    const TYPE_STRING = 1;

    public function isAlive() {
        if ($this->updated_at->getTimestamp() >= time() - env('ALIVE_CHECK_TIME')) {
            return true;
        }
        return false;
    }

    public function getValue() {
        if (self::TYPE_BOOLEAN == $this->type) {
            return in_array($this->value, ['t', 'T', 'True', 'true', 'TRUE']);
        }

        return $this->value;
    }

}

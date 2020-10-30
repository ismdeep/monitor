<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Token
 * @package App\Models
 *
 * @property int id
 * @property int user_id
 * @property string name
 * @property string token
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class Token extends Model {
    protected $table = 'tokens';
}

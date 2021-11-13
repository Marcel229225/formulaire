<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class POP
 * @package App\Models
 * @version February 11, 2020, 8:13 am UTC
 *
 * @property integer no_reference
 * @property integer name
 * @property integer details
 * @property integer chef_pop_id
 */
class POP extends Model
{
    use SoftDeletes;

    public $table = 'pop';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'no_reference',
        'name',
        'details',
        'chef_pop_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_reference' => 'integer',
        'name' => 'string',
        'details' => 'string',
        'chef_pop_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_reference' => 'required|unique:pop',
        'name' => 'required'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id', 'chef_pop_id')->withDefault(['name' => '']);
    }

    public function chief()
    {
        return $this->hasOne(User::class, 'id', 'chef_pop_id');
    }

}

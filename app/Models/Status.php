<?php
/**
 * Created by PhpStorm.
 * User: Ola
 * Date: 02.09.2017
 * Time: 19:01
 */
namespace Bevy\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'body'
    ];
    public function user()
    {
        return $this->belongsTo('Bevy\Models\User', 'user_id');
    }

    public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany('Bevy\Models\Status','parent_id');
    }
}
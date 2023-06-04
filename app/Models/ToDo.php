<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $guarded = ['id'];
    protected $table = ['ToDo'];
    public static $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    public function scopeFlag ($query, $num) {
        return $query->where('flg', $num);
    }
}

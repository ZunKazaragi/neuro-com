<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $table = "contents";
    public $incrementing = false;
    protected $fillable = [
        "id","member_id", "board_id", "group_id","head","body", "type"
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function progress()
    {
        return $this->HasOne('App\Progress');
    }

    public function board()
    {
        return $this->belongsTo('App\Board');
    }

    public function file()
    {
        return $this->hasOne('App\File');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserFiles extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    public $table = 'user_files';

    public function Channel() {
        return $this->belongsTo('App\Model\Files', 'file_id');
    }

}

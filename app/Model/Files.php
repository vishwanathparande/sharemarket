<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    public $table = 'files';

    public function UserFiles() {
        return $this->hasMany('App\Model\UserFiles', 'file_id');
    }

}

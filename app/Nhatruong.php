<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Nhatruong extends Authenticatable  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nhatruong';

    protected $primaryKey = 'nt_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nt_id', 'nt_tentruong', 'nt_diachi', 'nt_sodienthoai', 'nt_email', 'username', 'password', 'nt_trangthai'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

}

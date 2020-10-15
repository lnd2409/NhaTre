<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Giaovien extends Authenticatable  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'giaovien';
    protected $primaryKey = 'gv_id';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['username','password','gv_ten','gv_diachi','gv_sdt','gv_ngaysinh','gv_avata','gv_gioitinh','nt_id','lh_id'];

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

    public function nhaTruong()
    {
        return $this->belongsTo(Nhatruong::class, 'nt_id');
    }
}

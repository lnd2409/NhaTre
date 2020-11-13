<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Phuhuynh extends Authenticatable  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phuhuynh';
    protected $primaryKey = 'ph_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ph_hoten','username','password','ph_ngaysinh','ph_nghenghiep','ph_sdt','ph_diachi','nt_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['username','password'];

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

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property integer $id
 * @property int $cb_roles_id
 * @property integer $lembaga_pkbm_id
 * @property integer $paket_ujian_id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $photo
 * @property string $ip_address
 * @property string $user_agent
 * @property string $login_at
 * @property string $nisn
 * @property string $tipe
 * @property string $jurusan
 * @property string $nomor_ujian
 * @property string $terakhir_online
 * @property CbRole $cbRole
 * @property LembagaPkbm $lembagaPkbm
 * @property PaketUjian $paketUjian
 * @property CbNotification[] $cbNotifications
 * @property JawabanUser[] $jawabanUsers
 * @property RapotUser[] $rapotUsers
 */
class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['cb_roles_id', 'lembaga_pkbm_id', 'paket_ujian_id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'photo', 'ip_address', 'user_agent', 'login_at', 'nisn', 'tipe', 'jurusan', 'nomor_ujian', 'terakhir_online'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cbRole()
    {
        return $this->belongsTo('App\CbRole', 'cb_roles_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lembagaPkbm()
    {
        return $this->belongsTo('App\LembagaPkbm');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paketUjian()
    {
        return $this->belongsTo('App\PaketUjian');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cbNotifications()
    {
        return $this->hasMany('App\CbNotification', 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabanUsers()
    {
        return $this->hasMany('App\JawabanUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rapotUsers()
    {
        return $this->hasMany('App\RapotUser');
    }
}

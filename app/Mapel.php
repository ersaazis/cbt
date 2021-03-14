<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama
 * @property string $created_at
 * @property string $updated_at
 * @property string $jurusan
 * @property RapotUser $rapotUser
 * @property SoalEssai[] $soalEssais
 * @property SoalPg[] $soalPgs
 */
class Mapel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mapel';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'created_at', 'updated_at', 'jurusan'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rapotUser()
    {
        return $this->hasOne('App\RapotUser', 'mapel_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soalEssais()
    {
        return $this->hasMany('App\SoalEssai');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soalPgs()
    {
        return $this->hasMany('App\SoalPg');
    }
}

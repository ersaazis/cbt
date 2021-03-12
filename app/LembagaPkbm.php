<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $pkbm
 * @property string $npsn
 * @property string $created_at
 * @property string $updated_at
 * @property User[] $users
 */
class LembagaPkbm extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lembaga_pkbm';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['pkbm', 'npsn', 'created_at', 'updated_at' ,'punya_akun'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}

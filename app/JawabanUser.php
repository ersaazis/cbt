<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $soal_pg_id
 * @property integer $soal_essai_id
 * @property string $jawaban
 * @property string $created_at
 * @property string $updated_at
 * @property SoalEssai $soalEssai
 * @property SoalPg $soalPg
 * @property User $user
 */
class JawabanUser extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'jawaban_user';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'soal_pg_id', 'soal_essai_id', 'jawaban', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soalEssai()
    {
        return $this->belongsTo('App\SoalEssai');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soalPg()
    {
        return $this->belongsTo('App\SoalPg');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $paket_ujian_id
 * @property integer $mapel_id
 * @property string $soal
 * @property string $gambar
 * @property string $video
 * @property string $created_at
 * @property string $updated_at
 * @property Mapel $mapel
 * @property PaketUjian $paketUjian
 * @property JawabanUser[] $jawabanUsers
 */
class SoalEssai extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'soal_essai';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['paket_ujian_id', 'mapel_id', 'soal', 'gambar', 'video', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
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
    public function jawabanUsers()
    {
        return $this->hasMany('App\JawabanUser');
    }
}

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
 * @property string $jawaban
 * @property string $tipe_jawaban
 * @property string $pilihan_a
 * @property string $pilihan_b
 * @property string $pilihan_c
 * @property string $pilihan_d
 * @property string $gambar_pilihan_a
 * @property string $gambar_pilihan_b
 * @property string $gambar_pilihan_c
 * @property string $gambar_pilihan_d
 * @property string $created_at
 * @property string $updated_at
 * @property string $pilihan_e
 * @property string $gambar_pilihan_e
 * @property Mapel $mapel
 * @property PaketUjian $paketUjian
 * @property JawabanUser[] $jawabanUsers
 */
class SoalPg extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'soal_pg';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['paket_ujian_id', 'mapel_id', 'soal', 'gambar', 'video', 'jawaban', 'tipe_jawaban', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'gambar_pilihan_a', 'gambar_pilihan_b', 'gambar_pilihan_c', 'gambar_pilihan_d', 'created_at', 'updated_at', 'pilihan_e', 'gambar_pilihan_e'];

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

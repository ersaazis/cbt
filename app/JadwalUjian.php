<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $mapel_id
 * @property integer $paket_ujian_id
 * @property string $tanggal
 * @property string $created_at
 * @property string $updated_at
 * @property Mapel $mapel
 * @property PaketUjian $paketUjian
 */
class JadwalUjian extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'jadwal_ujian';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['mapel_id', 'paket_ujian_id', 'tanggal', 'created_at', 'updated_at'];

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
}

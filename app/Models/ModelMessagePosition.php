<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ModelMessagePosition
 *
 * @property int $id
 * @property string|null $chat_id
 * @property string|null $posisi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition wherePosisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelMessagePosition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ModelMessagePosition extends Model
{
    /**
     * tabel yang akan digunakan oleh model
     *
     * @var string
     */
    protected $table = 'message_position';

    /**
     * set data yang boleh di isi kedalam database
     *
     * @var array
     */
    protected $fillable = [
        'chat_id',
        'posisi'
    ];
}

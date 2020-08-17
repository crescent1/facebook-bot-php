<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
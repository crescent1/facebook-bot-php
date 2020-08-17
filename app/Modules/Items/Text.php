<?php

namespace App\Modules\Items;

class Text
{
    /**
     * text welcome
     *
     * @return string
     */
    public static function textWelcome()
    {
        $text = 'Assalamualaikum, selamat datang, silahkan pilih tombol dibawah!';

        return $text;
    }

    /**
     * text cs
     *
     * @return string
     */
    public static function textChatCS()
    {
        $text = 'Hai, kamu terhubung dengan cs, silahkan ketik pesan anda!';

        return $text;
    }
}

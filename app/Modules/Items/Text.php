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
     * text bot
     *
     * @return string
     */
    public static function textChatBOT()
    {
        $text = 'Hallo, ini adalah menu chat BOT!';

        return $text;
    }

    /**
     * text cs
     *
     * @return string
     */
    public static function textChatCS()
    {
        $text = 'Hai, kamu sedang terhung dengan CS!';

        return $text;
    }

    /**
     * text else
     *
     * @return string
     */
    public static function textChatElse()
    {
        $text = 'Maaf pesan anda tidak bisa diidentifikasi, hubungsi CS atau gunakan BOT';

        return $text;
    }
}

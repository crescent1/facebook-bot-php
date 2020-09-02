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

    /**
     * text template
     *
     * @return string
     */
    public static function textTemplate()
    {
        $text = 'Berikut beberapa contoh template!';

        return $text;
    }

    /**
     * data untuk generic template
     *
     * @return array
     */
    public static function textGenertic()
    {
        $title = 'Contoh Title';
        $subtitle = 'Contoh Subtitle';
        $photo = 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRy9LVpjaxOhg1zmVLWeBk5pWBfftKJOm1N1w&usqp=CAU';

        return [
            'title' => $title,
            'subtitle' => $subtitle,
            'photo' => $photo,
        ];
    }

    /**
     * text button template
     *
     * @return array
     */
    public static function textButton()
    {
        $text = 'Ini merupakan contoh penggunaan dari button template!';
        $button = 'Contoh Tombol';

        return [
            'text' => $text,
            'button' => $button,
        ];
    }
}

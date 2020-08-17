<?php

namespace App\Modules\BotFacebook;


class BFMessages
{
    /**
     * decode pesan, berinila true
     *
     * @param string $message
     * @return array
     */
    public static function messageDecode(string $message)
    {
        return json_decode($message, true);
    }

    /**
     * cek pesan berstatus stanby atau tidak
     *
     * @param array $data
     * @return string
     */
    public static function messageStatus(array $data)
    {
        $result = 'OTHER';

        if(array_key_exists('standby', $data['entry']['0'])) {

           $result = 'STANDBY';

        }

        return $result;
    }

    /**
     * cek type dari message
     *
     * @param array $data
     * @return string
     */
    public static function messageType(array $data)
    {
        $result = 'OTHER';

        if(array_key_exists('message', $data['entry']['0']['messaging']['0'])) {

            $result = 'MESSAGE';

        } elseif(array_key_exists('postback', $data['entry']['0']['messaging']['0'])) {

            $result = 'POSTBACK';

        } elseif(array_key_exists('take_thread_control', $data['entry']['0']['messaging']['0'])) {

            $result = 'TAKETHREAD';

        } elseif(array_key_exists('request_thread_control', $data['entry']['0']['messaging']['0'])) {

            $result = 'REQUESTTHREAD';

        } elseif(array_key_exists('pass_thread_control', $data['entry']['0']['messaging']['0'])) {

            $result = 'PASSTHREAD';

        }

        return $result;

    }

    /**
     * cek jenis isi message
     *
     * @param array $data
     * @return string
     */
    public static function messageContentsType(array $data)
    {
        $result = 'OTHER';

        if(array_key_exists('quick_reply', $data['entry']['0']['messaging']['0']['message'])) {

            $result = 'QUICK_REPLY';

        } elseif(array_key_exists('text', $data['entry']['0']['messaging']['0']['message'])) {

            $result = 'MESSAGE';

        }

        return $result;
    }

    /**
     * setting untuk persistent Menu
     *
     * @return array
     */
    public static function settingPersistentMenu()
    {
        /**
         * @var array $getStarted
         */
        $getStarted = [
            'payload' => 'MULAI',
        ];

        /**
         * @var array $persistentMenu
         */
        $persistentMenu = [
            [
                'locale' => 'default',
                'composer_input_disabled' => false,
                'call_to_actions' => [
                    [
                        'type' => 'postback',
                        'title' => 'CHAT BOT',
                        'payload' => 'CHATBOT'
                    ],
                    [
                        'type' => 'postback',
                        'title' => 'CHAT CS',
                        'payload' => 'CHATCS'
                    ],
                ],

            ],

        ];

        /**
         * @var array $message
         */
        $message = [
            'get_started' => $getStarted,
            'persistent_menu' => $persistentMenu,
        ];

        return $message;

    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public static function deletePersistentMenu()
    {
        /**
         * @var array $message
         */
        $message = [
            'fields' => [
                'persistent_menu',
            ],
        ];

        return $message;
    }

    /**
     * fungsi untuk mengambil alaih percakapan dari cs ke bot
     *
     * @param string $senderID
     * @return array
     */
    public static function takeThreadControl(string $senderID)
    {
        /**
         * @var array $message
         */
        $message = [
            'recipient' => [
                'id' => $senderID,
            ],
            'metadata' => 'Control take by BOT!',
        ];

        return $message;
    }

    /**
     * digunakan untuk menyerahkan controll percakapan pada app lain
     * pada contoh ini percakapan dialihkan pada inbox halaman yang dapat di gunakan oleh CS
     * ketika control diserahkan ke inbox, targat_app_id harus di isi 263902037430900
     *
     * @param string $senderID
     * @return array
     */
    public static function passThreadControl(string $senderID)
    {
        /**
         * @var array $message
         */
        $message = [
            'recipient' => [
                'id' => $senderID,
            ],
            'target_app_id' => '263902037430900',
            'metadata' => 'Control pass to Inbox CS!',
        ];

        return $message;
    }

    /**
     * Seeting parameter button Template
     *
     * @param array $data
     * @return array
     */
    public static function buttonTemplate(array $data)
    {
        /**
         * @var array $recipient
         */
        $recipient = [
            'id' => $data['senderID'],
        ];

        /**
         * @var array $dataMessage
         */
        $dataMessage = [
            'attachment' => [
                'type' => 'template',
                'payload' => [
                    'template_type' => 'button',
                    'text' => $data['text'],
                    'buttons' => $data['button'],
                ],
            ],

        ];

        /**
         * @var array $message
         */
        $message = [
            'messaging_type' => 'RESPONSE',
            'recipient' => $recipient,
            'message' => $dataMessage,
        ];

        return $message;
    }
}

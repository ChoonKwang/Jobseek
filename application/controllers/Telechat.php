<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telechat extends CI_Controller {

	public $data = array();
	public $error = 0;

    function __construct(){
        parent::__construct();
        $this->telegram = new Telegram($this->config->item('telegram_token'));

    }

    public function index ()
    {
        $bot_token = '580716255:AAFpxMtnWbA8m6LDoigWvIlorSGDGuC3PAg';
        $telegram = new Telegram($bot_token);

        // Get all the new updates and set the new correct update_id
        $req = $telegram->getUpdates();
        for ($i = 0; $i < $telegram->UpdateCount(); $i++) {
            // You NEED to call serveUpdate before accessing the values of message in Telegram Class
            $telegram->serveUpdate($i);
            $text = $telegram->Text();
            $chat_id = $telegram->ChatID();

            if ($text == '/id') {
                // Build the reply array
                $content = ['chat_id' => $chat_id, 'text' => $chat_id];
                $telegram->sendMessage($content);
            }
        }
    }

    public function autosend()
    {

        $text = $this->input->get_post('text');
        $chat_id = '-1001244547047';
        $content = array('chat_id' => $chat_id, 'text' => $text);
        $this->telegram->sendMessage($content);
    }

}

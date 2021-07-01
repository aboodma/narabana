<?php

use App\InputTransaction;

if (!function_exists('_ti')) {
    function _ti($sting)
    {
       return InputTransaction::translate_input($sting);
    }
}

if (!function_exists('send_notify')) {
    function send_notify($token , $title , $body , $image = null)
    {
        $SERVER_API_KEY = 'AAAAR82IgZ8:APA91bFgCLeZ8UnOOSesm56MzwyYArieTTuQ_q5BiuNL_a6gozabJnmBfUfn9D3xcL1v1aAwK14dIzMcDFtTkouL05jYB8SdIZqtQY0jvt7mT1yAK8pCTFHdEEzcTF3P7XhG01KKSnWF';

    $data = [

        "registration_ids" => [
           $token
        ],

        "notification" => [

            "title" => $title,

            "body" => $body,

            'image' => $image,

            "sound" => true

        ],

        "data" => [
            'click_action'=> 'FLUTTER_NOTIFICATION_CLICK',
        ]

    ];

    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];
            
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    curl_exec($ch);
    }
}

if (!function_exists('slugify')) {
    function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
    
      // trim
      $text = trim($text, $divider);
    
      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);
    
      // lowercase
      $text = strtolower($text);
    
      if (empty($text)) {
        return 'n-a';
      }
    
      return $text;
    }
    }
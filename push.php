<?php
    
    function push() {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $YOUR_API_KEY = 'AAAAyK4rOx4:APA91bHy7lzQU0ZFjmA9PfhjDU7FPT8D0vd9uyKAiKwv4A9XNpoA1e45fk68pIozDIgYrjmkcVL5bWiRz-THR3locl4axxJyhMm_shLkLndMP9mfXgnl2K1IYDuxESQxr1JUxxIbmQhw'; // Server key
        $YOUR_TOKEN_ID = 'id:устройства'; // Client token id
        $request_body = array(
                              'to' => '/topics/all',
                              'notification' => array(
                                                      'title' => 'Ералаш',
                                                      'body' => sprintf('Начало в %s.', date('H:i')),
                                                      'icon' => 'https://eralash.ru.rsz.io/sites/all/themes/eralash_v5/logo.png?width=192&height=192',
                                                      'click_action' => 'http://eralash.ru/',
                                                      ),
                              );
        $fields = json_encode($request_body);
        $request_headers = array(
                                 'Content-Type: application/json',
                                 'Authorization: key=' . $YOUR_API_KEY,
                                 );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }
    
    push();
?>

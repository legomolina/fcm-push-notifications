<?php

namespace FCMPushNotifications;

/**
 * Class to send push notifications using Google Firebase
 *
 * NEEDS cURL module for PHP to work
 *
 * @author Cristian Molina
 *
 * Adapted from the code available at:
 * https://github.com/mattg888/GCM-PHP-Server-Push-Message
 *
 * from the user Matt Grundy
 */
class FCMPushNotifications
{
    // Server API key obtained from Google
    public static $API_KEY = 'my_api_key';

    // Google URL to send the response
    private static $URL = 'https://fcm.googleapis.com/fcm/send';

    /**
     * Sends a notification
     * @param string $to Device token or topic to send the notification
     * @param string $title The title to show in the notification
     * @param string $message The message to show in the notification
     * @param array $data Optional data to send
     * @return mixed cURL response
     */
    public static function send($to, $title = "", $message = "", $icon = "", $sound = "", $data = array())
    {
        $fields = array(
            "to" => $to,
            "notification" => array(
                "title" => $title,
                "text" => $message,
                "sound" => $sound,
                "icon" => $icon
            )
        );

        if (is_array($data) && count($data) > 0) {
            foreach ($data as $key => $value) {
                $fields['data'][$key] = $value;
            }
        }

        $headers = array(
            'Authorization: key=' . self::$API_KEY,
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, self::$URL);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Avoids problem with https certificate
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute post
        $result = curl_exec($ch);

        //Retrieve http status
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close connection
        curl_close($ch);

        return json_encode([
            "response" => $result,
            "status" => $status
        ]);
    }
}

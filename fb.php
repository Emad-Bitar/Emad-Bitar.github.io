<?php

class Facebook {

    public static function getEvents($filter = "upcoming", $limit = false)
    {

    }

    private static function apiCall($url, $fields = [])
    {
        $fields['access_token'] = c::get('facebook-graph-api-access_token', false);

        $baseUrl = 'https://graph.facebook.com/';
        $url = $baseUrl . $url . "?" . http_build_query($fields);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ]);
        $json = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($json);
        return $data;
    }

}

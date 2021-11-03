<?php

/**
 * Stackoverflow copy
 * Lekérem vele az API-t
 */

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

function CallAPI($method, $url, $access_key, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

/**
 * Lementettem az adatbázist a véges számú lekérések végének elkerülése érdekében 
 * Mivel 1szer elég volt kikommenteltem
 */

//$repterek = json_decode(CallAPI("GET", "http://api.aviationstack.com/v1/flights?access_key=bb59eaea66db3d80c7acb6fae93d1878", ["param" => "value"]), true)["data"];
//$json = json_encode($repterek);
//$bytes = file_put_contents("data.json", $json);

?>
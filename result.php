<?php
include("Dom.php");

function GenerateUrl($cout)
{
    return ("https://www.google.com/search?q=" . str_replace(' ', '+', strtolower($cout)));
}
if (isset($_POST)) {
    if (isset($_POST['cin'])) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, GenerateUrl($_POST['cin']));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $dom = new Dom();
        $dom->load($result);
        print_r("<br/>");
        $paragraph = null;
        foreach ($dom->find('div') as $link) {
            if (str_word_count($link->plaintext) > 12) {
                if (strpos($link->plaintext, "Verbatim") !== false) {
                    $str = explode("Verbatim", $link->plaintext);
                    // $paragraph = explode("�", explode("View all", $str[1]));
                    $paragraph =  explode("View all", $str[1]);
                }
                $collections = explode(chr(0xFC), $paragraph[0]);
                foreach ($collections as $ar) {
                    $raw = preg_replace("/[^a-zA-Z .]/", "", $ar) . "<br/>";
                    echo  substr($raw, 0,  -44);
                }
                break;
            }
        }
    }
}

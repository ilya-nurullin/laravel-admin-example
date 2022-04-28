<?php

namespace App\Services;

class XmlToJsonConverter
{
    public function convert(string $xmlString): array
    {
        $xml = simplexml_load_string($xmlString);
        $json = json_encode($xml);
        return json_decode($json,TRUE);
    }

}

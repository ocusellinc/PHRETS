<?php namespace PHRETS\Parsers\Update;

use PHRETS\Http\Response;
use PHRETS\Session;

class OneEight
{
    public function parse(Session $rets, Response $response, $parameters)
    {
        $xml = $response->xml();

        $replyCode = (int) $xml['ReplyCode'];
        $replyText = (string) $xml['ReplyText'];
        $errors = [];

        if($xml->ERRORBLOCK) {
            $errors = collect((array) $xml->ERRORBLOCK->ERRORDATA)->map(
                fn($line) => explode("\t", trim($line)),
            )->values();
        }

        return [
            'response' => json_encode($xml),
            'code' => $replyCode,
            'message' => $replyText,
            'success' => $replyCode === 0,
            'errors' => $errors,
        ];
    }
}

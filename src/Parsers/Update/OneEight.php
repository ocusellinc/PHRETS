<?php namespace PHRETS\Parsers\Update;

use PHRETS\Http\Response;
use PHRETS\Session;

class OneEight
{
    public function parse(Session $rets, Response $response, $parameters)
    {
        return $response;
    }
}

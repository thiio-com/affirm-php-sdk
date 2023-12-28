<?php

namespace Thiio\Affirm\Traits;


trait BaseResponseTrait
{
    private function getDefaultResponse()
    {
        return (object) [
            'msg' => '',
            'error' => '',
            'success' => false
        ];
    }
}
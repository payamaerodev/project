<?php

namespace App\Exceptions;

use Exception;

class NoPhotoException extends Exception
{
    public function render ()
    {
        return view('errors.no-photo');
    }
}

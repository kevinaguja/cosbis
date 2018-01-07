<?php

namespace App\Cosbis\Filetransfer\Classes;

use App\Cosbis\FileTransfer\Classes\PhotoTransfer;

class EventImageTransferable extends PhotoTransfer
{
    public function getDestinationFolder()
    {
        return '/img/events/';
    }
}
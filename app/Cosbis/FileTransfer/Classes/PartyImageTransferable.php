<?php

namespace App\Cosbis\Filetransfer\Classes;

use App\Cosbis\FileTransfer\Classes\PhotoTransfer;

class PartyImageTransferable extends PhotoTransfer
{
    public function getDestinationFolder()
    {
        return '/img/elections/parties/banners/';
    }
}
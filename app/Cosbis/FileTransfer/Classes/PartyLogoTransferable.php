<?php

namespace App\Cosbis\Filetransfer\Classes;

use App\Cosbis\FileTransfer\Classes\PhotoTransfer;

class PartyLogoTransferable extends PhotoTransfer
{
    public function getDestinationFolder()
    {
        return '/img/elections/parties/logos/';
    }
}
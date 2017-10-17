<?php

namespace App\Craftbeer\Filetransfer\Classes;

use App\Cosbis\FileTransfer\Classes\PhotoTransfer;

class AccountImageTransferable extends PhotoTransfer
{
    public function getDestinationFolder()
    {
        return '/img/account_img/';
    }
}
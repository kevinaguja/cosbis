<?php

namespace App\Cosbis\FileTransfer\Classes;

use App\Craftbeer\Filetransfer\Interfaces\PhotoTransferInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

abstract class PhotoTransfer implements PhotoTransferInterface
{
    protected $destinationFolder;

    public function __construct()
    {
        $this->destinationFolder= $this->getDestinationFolder();
    }

    public abstract function getDestinationFolder();

    public function move($file)
    {
        $path = $file->store(
            $this->getDestinationFolder(), 'uploads'
        );

        return '/'.$path;
    }
}
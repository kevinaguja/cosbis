<?php

namespace App\Cosbis\FileTransfer\Classes;

use App\Craftbeer\Filetransfer\Interfaces\PhotoTransferInterface;
use Carbon\Carbon;

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
        $imageName = preg_replace('/[^0-9]/', '', Carbon::now()) . '.' .
            $this->getOriginalFileExtension($file);

        $file->move(
            base_path() . "/public".$this->getDestinationFolder(), $imageName
        );

        return $this->getDestinationFolder(). $imageName;
    }

    public function getOriginalFileExtension($file)
    {
        return $file->getClientOriginalExtension();
    }
}
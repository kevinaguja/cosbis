<?php

namespace App\Craftbeer\Filetransfer\Classes;

use App\Craftbeer\Filetransfer\Interfaces\PhotoTransfer;
use Carbon\Carbon;

class PhotoTransferable implements PhotoTransfer
{


	public static function move($file,
        $destinationFolder= '/public/img/events/',
        $databaseName= '/img/events/')
	{
        $imageName = preg_replace('/[^0-9]/', '', Carbon::now()) . '.' .
            self::getOriginalFileExtension($file);

        $file->move(
            base_path() . $destinationFolder, $imageName
        );

        return $databaseName. $imageName;
	}

    public static function getOriginalFileExtension($file)
    {
        return $file->getClientOriginalExtension();
    }
}
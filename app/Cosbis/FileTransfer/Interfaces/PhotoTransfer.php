<?php 

namespace App\Craftbeer\Filetransfer\Interfaces;

interface PhotoTransfer
{
	public static function move($file, $destinationFolder, $databaseName);
}
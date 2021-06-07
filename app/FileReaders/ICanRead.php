<?php


namespace App\FileReaders;


interface ICanRead
{


	/**
	 * Process File
	 *
	 * @param string $userFileName
	 *
	 * @return array
	 */
	public function processFile(string $userFileName): array;


	/**
	 * Convert For Csv Download
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	public function convertForDownload(array $data): array;


}
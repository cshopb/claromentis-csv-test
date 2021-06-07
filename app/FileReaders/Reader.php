<?php


namespace App\FileReaders;


abstract class Reader implements ICanRead
{


	/**
	 * {@inheritDoc}
	 */
	abstract public function processFile(string $userFileName): array;


	/**
	 * {@inheritDoc}
	 */
	abstract public function convertForDownload(array $data): array;


}
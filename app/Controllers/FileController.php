<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\File;
use App\Core\Session;
use App\Core\View;

class FileController extends Controller
{

	/**
	 * Index
	 *
	 * @return void
	 */
	public function upload(): void
	{
		$fileType = explode('/', File::type('dataFile'))[1];

		$readerClass = 'App\FileReaders\\' . ucfirst($fileType) . 'Reader';

		/* @var \App\FileReaders\ICanRead $reader */
		$reader = new $readerClass();

		$result = $reader->processFile('dataFile');

		Session::store('fileResult', $result);

		View::render('home/index', ['tableData' => $result]);
	}


	/**
	 * Download
	 *
	 * @param array $request
	 *
	 * @return void
	 */
	public function download(array $request): void
	{
		$readerClass = 'App\FileReaders\\' . ucfirst($request['readerType']) . 'Reader';

		/* @var \App\FileReaders\ICanRead $reader */
		$reader = new $readerClass();

		$data = $reader->convertForDownload(Session::get('fileResult'));

		File::downloadAsCsv($data);

	}//end download()

}
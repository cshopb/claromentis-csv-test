<?php


namespace App\Core;


class File
{


	/**
	 * Read File To Array
	 *
	 * @param string $fileName
	 *
	 * @return array|false
	 */
	public static function readFileToArray(string $fileName): bool|array
	{
		return file($fileName);

	}//end readFileToArray()


	/**
	 * Name
	 * The original name of the file on the client machine.
	 *
	 * @param string $userFile
	 *
	 * @return string
	 */
	public static function name(string $userFile): string
	{
		return $_FILES[$userFile]['name'];
	}


	/**
	 * Type
	 * The mime type of the file, if the browser provided this information. An example would be "image/gif".
	 * This mime type is however not checked on the PHP side and therefore don't take its value for granted.
	 *
	 * @param string $userFile
	 *
	 * @return string
	 */
	public static function type(string $userFile): string
	{
		return strtolower($_FILES[$userFile]['type']);
	}


	/**
	 * Size
	 * The size, in bytes, of the uploaded file.
	 *
	 * @param string $userFile
	 *
	 * @return string
	 */
	public static function size(string $userFile): string
	{
		return $_FILES[$userFile]['size'];
	}


	/**
	 * Tmp_name
	 * The temporary filename of the file in which the uploaded file was stored on the server.
	 *
	 * @param string $userFile
	 *
	 * @return string
	 */
	public static function tempName(string $userFile): string
	{
		return $_FILES[$userFile]['tmp_name'];
	}


	/**
	 * Error
	 * The error code associated with this file upload.
	 *
	 * @param string $userFile
	 *
	 * @return string
	 */
	public static function error(string $userFile): string
	{
		return $_FILES[$userFile]['error'];
	}


	/**
	 * Download As Csv
	 * @url https://stackoverflow.com/questions/16251625/how-to-create-and-download-a-csv-file-from-php-script
	 *
	 * @param array  $array
	 * @param string $filename
	 * @param string $delimiter
	 *
	 * @return void
	 */
	public static function downloadAsCsv(array $array, string $filename = 'data.csv', string $delimiter = ','): void
	{
		// Tell the browser it's going to be a csv file
		header('Content-Type: application/csv');

		// Tell the browser we want to save it instead of displaying it
		header('Content-Disposition: attachment; filename="' . $filename . '";');

		// Open the "output" stream
		$f = fopen('php://output', 'wb');

		foreach ($array as $line) {
			// Generate csv lines from the inner arrays
			fputcsv(
				$f,
				$line,
				$delimiter
			);
		}
	}


}
<?php


namespace App\FileReaders;


use App\Core\File;

class CsvReader extends Reader
{


	/**
	 * {@inheritDoc}
	 */
	public function processFile(string $userFileName): array
	{
		$fileTmpName = File::tempName($userFileName);
		$data        = array_map('str_getcsv', File::readFileToArray($fileTmpName));

		return $this->processCsvData($data);

	}//end processFile()


	/**
	 * Process FileController Data
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	private function processCsvData(array $data): array
	{
		$result = [];
		foreach ($data as $row) {
			$category = filter_var($row[0], FILTER_SANITIZE_STRING);
			$price    = filter_var($row[1], FILTER_SANITIZE_STRING);
			$amount   = filter_var($row[2], FILTER_SANITIZE_STRING);

			if (isset($result[$category]) === FALSE) {
				$result[$category] = [
					'price'  => 0,
					'amount' => 0,
				];
			}
			$result[$category]['price']  += $price;
			$result[$category]['amount'] += $amount;
		}

		return $result;

	}//end processCsvData()


	/**
	 * {@inheritDoc}
	 */
	public function convertForDownload(array $data): array
	{
		$result = [];
		foreach ($data as $column => $values) {
			$result[] = [
				$column,
				...array_values($values),
			];
		}//end foreach

		return $result;

	}//end convertForCsvDownload()


}
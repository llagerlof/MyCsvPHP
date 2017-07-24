<?php

class MyCsvPHP {

	const OVERWRITE = 'w';
	const APPEND = 'a';

	public static function tableArrayToCsv($tableArray, $filePath, $fileWriteMode = self::OVERWRITE) {
		$filePointer = fopen($filePath, $fileWriteMode) or die("Can't create or open file: '$filePath'");
		$not_empty_array = (is_array($tableArray) && !empty($tableArray));

		if ($not_empty_array) {
			if (($fileWriteMode == self::OVERWRITE) || (filesize($filePath) == 0)) {
				fputcsv($filePointer, array_keys($tableArray[0]));
			}

			foreach($tableArray as $record) {
				fputcsv($filePointer, $record);
			}
		}

		fclose($filePointer) or die("Can't close the file: '$filePath'");
	}
}

/*
// Examples:
// MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv'); // Default is overwrite existing file.
// MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv', MyCsvPHP::OVERWRITE);
// MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv', MyCsvPHP::APPEND);
*/

?>
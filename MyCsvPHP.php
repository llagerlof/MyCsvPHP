<?php

class MyCsvPHP {

	const OVERWRITE = 'w';
	const APPEND = 'a';

	public static function tableArrayToCsv($tableArray, $filePath, $fileWriteMode = self::OVERWRITE) {
		if (self::enabled()) {
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
	
	private static function enabled() {
		if (file_exists(dirname(__FILE__) . '/MyCsvPHP.conf')) {
			$contents = file(dirname(__FILE__) . '/MyCsvPHP.conf');
			foreach ($contents as $line) {
				$config_value = explode('=', $line);
				if (($config_value[0] == "enabled") && (trim($config_value[1]) == "false")) {
					return false;
				}
			}

		}
		return true;
	}
}

/*
// Examples:
// MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv'); // Default is overwrite existing file.
// MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv', MyCsvPHP::OVERWRITE);
// MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv', MyCsvPHP::APPEND);
*/

?>
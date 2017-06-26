# MyCsvPHP
MyCsvPHP is a single class to perform some manipulation in CSV files.

## Features

### MyCsvPHP::tableArrayToCsv()

Create a CSV file from 2-dimensional array.

#### Examples
```
$tableArray = array(
  0 => array('id' => 1, 'name' => 'Lawrence'),
  1 => array('id' => 2, 'name' => 'Angelica')
);

MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv'); // Default is overwrite existing file.
MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv', MyCsvPHP::OVERWRITE);
MyCsvPHP::tableArrayToCsv($tableArray, 'file.csv', MyCsvPHP::APPEND);
```

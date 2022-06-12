<?php

namespace App\Traits;

use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

trait ExcelReader
{
    /**
     * @param $file
     * @param string $sheetName
     *
     * @return array
     */
    public function read($file, string $sheetName)
    {
        $reader = new Xlsx();

        $sheet = $reader->load($file);

        $worksheets = $sheet->getSheetByName($sheetName);

        if (!$worksheets) {
            return [];
        }

        return $worksheets->toArray();
    }

    /**
     * @param $file
     * @param int $sheetIndex
     *
     * @return array
     * @throws Exception
     */
    public function readWorkSheetByIndex($file, int $sheetIndex)
    {
        $reader = new Xlsx();

        $sheet = $reader->load($file);

        try {
            $worksheets = $sheet->getSheet($sheetIndex);
        } catch (\Exception $e) {
            return [];
        }

        if (!$worksheets) {
            return [];
        }

        return $worksheets->toArray();
    }
}

<?php
namespace Naroat\Ivory\Arr;

class Arr
{
    /**
     * 删除数组中的某个值
     * @param array $array 输入数组
     * @param mixed $value 要删除的值
     * @return array 返回删除指定值后的数组
     */
    public static function removeValue(array $array, $value): array
    {
        return array_values(array_filter($array, function ($item) use ($value) {
            return $item !== $value;
        }));
    }

    /**
     * 对多维数组进行排序
     * @param array $array 输入的多维数组
     * @param string $key 要排序的键名
     * @param int $sortOrder 排序顺序，SORT_ASC 或 SORT_DESC
     * @return array 返回排序后的数组
     */
    public static function arrSort(array $array, string $key, int $sortOrder = SORT_ASC): array
    {
        usort($array, function ($a, $b) use ($key, $sortOrder) {
            if (!isset($a[$key]) || !isset($b[$key])) {
                return 0; // 如果键不存在，保持原有顺序
            }
            return $sortOrder === SORT_ASC ? $a[$key] <=> $b[$key] : $b[$key] <=> $a[$key];
        });

        return $array;
    }

    /**
     * 将对象转换成数组
     * @param object $object 输入对象
     * @return array 返回转换后的数组
     */
    public static function objToArr($object): array
    {
      if (! is_object($object)) {
        return $object;
      }
      return json_decode(json_encode($object), true);
    }

    /**
     * xml转数组
     *
     * @param $xml
     * @return mixed
     */
    public static function xmlToArr(string $xml): array
    {
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }

    /**
     * 数组转XML
     * @param array $array 输入数组
     * @param SimpleXMLElement|null $xmlData 用于递归的XML对象
     * @return string 返回转换后的XML字符串
     */
    public static function arrToXml(array $array, ?\SimpleXMLElement $xmlData = null): string
    {
        if ($xmlData === null) {
            $xmlData = new \SimpleXMLElement('<root/>');
        }

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                self::arrToXml($value, $xmlData->addChild($key));
            } else {
                $xmlData->addChild($key, htmlspecialchars((string) $value));
            }
        }

        return $xmlData->asXML();
    }

    /**
     * 将CSV文件转换为数组
     * @param string $filename CSV文件路径
     * @param bool $header 是否将第一行作为数组的键名
     * @return array 返回转换后的数组
     * @throws \Exception 如果文件无法打开
     */
    public static function csvToArr(string $filename, bool $header = true): array
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new \Exception("File not found or not readable: $filename");
        }

        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            if ($header) {
                $keys = fgetcsv($handle);
            }
            while (($row = fgetcsv($handle)) !== false) {
                if ($header) {
                    $data[] = array_combine($keys, $row);
                } else {
                    $data[] = $row;
                }
            }
            fclose($handle);
        }

        return $data;
    }

    /**
     * 数组转CSV
     * @param array $array 输入数组
     * @param bool $header 是否将第一行作为数组的键名
     * @return string 返回CSV字符串
     */
    public static function arrToCsv(array $array, bool $header = true): string
    {
        if (empty($array)) {
            throw new \Exception("Array is empty, nothing to convert.");
        }

        $output = fopen('php://temp', 'r+'); // 使用临时内存流
        if ($header) {
            fputcsv($output, array_keys($array[0])); // 写入表头
        }

        foreach ($array as $row) {
            fputcsv($output, $row); // 写入每一行
        }
        

        rewind($output); // 重置指针到流的开始
        $csvString = stream_get_contents($output); // 获取CSV字符串
        fclose($output); // 关闭流

        return $csvString;
    }


    /**
     * 返回两个数组中不同的元素
     * @param array $array1 第一个数组
     * @param array $array2 第二个数组
     * @return array 返回两个数组中不同的元素
     */
    public static function arrDiff(array $array1, array $array2): array
    {
        return array_merge(array_diff($array1, $array2), array_diff($array2, $array1));
    }
}
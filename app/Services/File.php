<?php
/**
 * Created by PhpStorm.
 * User: henly
 * Date: 2016/12/21
 * Time: 22:04
 */

namespace App\Services;


class File
{

    const REPO = 'repo';

    public function getFileList(&$list, $dir = '')
    {
        !$dir && $dir = self::REPO;
        if (false != ($handle = opendir($dir))) {
            $i = 1;
            while (false !== ($file = readdir($handle))) {
                //过滤 . & ..
                if (in_array($file, ['.', '..'])) continue;
                $file_path = $dir . '/' . $file;
                if ($file_path == self::REPO . '/readme.md') continue;
                $list[$i] = [
                    'text' => $file,
                    'href' => "/md?s=" . strstr($file_path, '/'),
                ];
                if (strpos($file, '.md')) {
                    $info = $this->getFileInfo($file_path);
                    $list[$i]['text'] = $info['title'];
                    $list[$i]['icon'] = "glyphicon glyphicon-file";
                    $list[$i]['selectedIcon'] = "glyphicon glyphicon-file";
                    $i++;
                    continue;
                }
                $list[$i]['nodes'] = [];
                $list[$i]['href'] = "#";
                $this->getFileList($list[$i]['nodes'], $file_path);
                $list[$i]['tags'] = [count($list[$i]['nodes'])];
                $i++;
            }
            //关闭句柄
            closedir($handle);
        }
        return $list;
    }

    public function getFileInfo($filename)
    {
        $title = $content = '';
        if (file_exists($filename)) {
            $content = file_get_contents($filename);
            !$content && $content = '';
            if ($content) {
                $title = $this->getLine($filename, 1);
            }
        }
        return [
            'title' => $title,
            'content' => $content
        ];
    }

    private function getLine($file, $line, $length = 33)
    {
        $returnTxt = null; // 初始化返回
        $i = 1; // 行数
        $handle = @fopen($file, "r");
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle, $length);
                if ($line == $i) $returnTxt = $buffer;
                $i++;
            }
            fclose($handle);
        }
        return str_replace("# ", '', $returnTxt . "...");
    }
}
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


    public function getFileList($dir = 'repo', &$list = [])
    {
        if (false != ($handle = opendir($dir))) {
            while (false !== ($file = readdir($handle))) {
                //过滤 . & ..
                if (in_array($file, ['.', '..'])) continue;
                if (strpos($file, '.md')) {
                    array_push($list, $file);
                    continue;
                }
                $list[$file] = [];
                $this->getFileList($dir . '/' . $file, $list[$file]);
            }
            //关闭句柄
            closedir($handle);
        }
        asort($list);
        return $list;
    }

    public function getFileInfo($filename)
    {
        $content = '';
        if (file_exists($filename)) {
            $content = file_get_contents($filename);
            !$content && $content = '';
        }
        return $content;
    }

}
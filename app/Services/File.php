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

    private $list = [];

    public function getFileList(&$list, $dir = 'repo')
    {
        if (false != ($handle = opendir($dir))) {
            $i = 1;
            while (false !== ($file = readdir($handle))) {
                //过滤 . & ..
                if (in_array($file, ['.', '..'])) continue;
                $file_path = $dir . '/' . $file;
                if ($file_path == 'repo/readme.md') continue;
                $list[$i] = [
                    'text' => $file,
                    'href' => "/md?s=" . $file_path,
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
                $title = 'sss';
            }
        }
        return [
            'title' => $title,
            'content' => $content
        ];
    }
}
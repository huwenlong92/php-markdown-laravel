<?php
/**
 * Created by PhpStorm.
 * User: henly
 * Date: 2016/12/21
 * Time: 17:57
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use \HFile;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{


    public function index()
    {
        $md_text = HFile::getFileInfo("repo/readme.md");
        $html_text = (new \Parsedown())->text($md_text['content']);
        return view('front/markdown/detail', ['content' => $html_text]);
    }


    public function dirList()
    {
        $dir_list = HFile::getFileList([[
            'text' => "首页",
            'href' => "/md?s=/readme.md",
            'icon' => "glyphicon glyphicon-file",
            'selectedIcon' => "glyphicon glyphicon-file",
        ]]);
        return json_encode($dir_list, JSON_UNESCAPED_UNICODE);
    }

    public function repo()
    {
        $filename = Input::get('s');
        $md_text = HFile::getFileInfo("repo" . $filename);
        $html_text = (new \Parsedown())->text($md_text['content']);
        return view('front/markdown/detail', ['content' => $html_text]);
    }

}
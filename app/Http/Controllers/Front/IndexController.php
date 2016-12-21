<?php
/**
 * Created by PhpStorm.
 * User: henly
 * Date: 2016/12/21
 * Time: 17:57
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{


    public function index()
    {

        $dir_list = \HFile::getFileList();
        $md_text = \HFile::getFileInfo("repo/" . $dir_list[0]);

        $parsedown = new \Parsedown();
        $html_text = $parsedown->text($md_text);
        return view('front/markdown/detail', ['dir_list' => $dir_list, 'content' => $html_text]);
    }

}
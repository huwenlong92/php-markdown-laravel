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

        $md_text = <<<EOF
# index

by henly

---
## Intro ##

This is an example file parsed by mdWorm, which is located at ./md/hello.md.  mdWorm is best used with Mou, a famous Markdown Editor on MacOSX

## Basic ##

* __I'm BOLD!__
* _I'm Italic!_
* `I'm inline code!`
* I'm

		code
		block
* I'm ~~Strikethrough~~!
* I'm an

	1. ordered
	2. list

## Link ##
Check [this out](https://github.com/bclicn/PsychoCat) !

## Image ##

![Logo!](/markdown/img/logo.jpg "Logo") Excuse me ?? !

## Table ##

First Header | Second Header | Third Header
------------ | ------------- | ------------
Content Cell | Content Cell  | Content Cell
Content Cell | Content Cell  | Content Cell


## h2 ##

### h3 ###

#### h4 ####

#### h5 ####

---
## Reference ##

* Youtube

	[http://www.youtube.com](http://www.youtube.com)

* Facebook

	[http://www.facebook.com](http://www.facebook.com)

---
bcli 2016-8-29

EOF;
        $parsedown = new \Parsedown();
        $html_text = $parsedown->text($md_text);

//        $html_text = Markdown::defaultTransform($md_text);
        return view('front/markdown/detail', ['title' => 'henly', 'content' => $html_text]);
    }

}
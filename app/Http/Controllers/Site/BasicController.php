<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class BasicController extends Controller
{
    protected $vars = [];
    protected $content;

    public function renderBasic()
    {
//        $this->vars = Arr::add($this->vars, 'title', $this->title);
//        $this->vars = Arr::add($this->vars, 'description', $this->description);

//        $this->vars = Arr::add($this->vars, 'targeting_url', $this->targeting_url);
//        $this->vars = Arr::add($this->vars, 'branding_url', $this->branding_url);
//
//        $this->vars = Arr::add($this->vars, 'is_mobile', $this->is_mobile);

        $this->vars = Arr::add($this->vars, 'header', view('site.components.headers.ru')->render());
        $this->vars = Arr::add($this->vars, 'footer', view('site.components.footer.ru')->render());

//        $this->vars = Arr::add($this->vars, 'footer', view('OLEGYERA.FrontBox.COMPONENTS.footers.' . ($this->is_mobile ? 'mobile.' : 'desktop.') . $this->lang)->render());
//
//        $this->vars = Arr::add($this->vars, 'jss', $this->jss);
//        $this->vars = Arr::add($this->vars, 'css', $this->css);
//        $this->vars = Arr::add($this->vars, 'twitter_tags', $this->twitter_tags);
//        $this->vars = Arr::add($this->vars,'description_default_seo',$this->description_default_seo);
//
        if ($this->content) {
            $this->vars = Arr::add($this->vars, 'content', $this->content);
        }
        header('Vary: User-Agent');
        return view('site.templates.basicBLADE')->with($this->vars);
    }



}

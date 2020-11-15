<?php

namespace App\Http\Controllers\Site\Auto;

use App\Http\Controllers\System\ExchangeRatesController;
use App\ParserUrlList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Site\BasicController;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class PageController extends BasicController
{

    public function startru(){
        $this->content = view('site.auto.home.ru')->render();
        return $this->renderBasic();
    }
    public function startua(){
        $this->content = view('site.auto.home.ua')->render();
        return $this->renderBasic();
    }

    public function filterru(){
        $this->content = view('site.auto.filter.ru')->render();
        return $this->renderBasic();
    }
    public function filterua(){
        $this->content = view('site.auto.filter.ua')->render();
        return $this->renderBasic();
    }

    public function cardru($id)
    {
        $card = ParserUrlList::findOrFail($id);

        $analog_city = ParserUrlList::where('status', 3);

        $analog_city = $analog_city->whereHas('main', function ($q) use ($card) {
            $q->where('city_id', $card->main->city->id);
        });

        $this->content = view('site.auto.card.ru')->with([
            'card' => $card,
            'exchange' => (new ExchangeRatesController)->getExchange(),
            'images' => $card->photos()->where('path', '!=', 'auto/' . $card->id . '/basic.jpg')->get(),
            'analog' => $analog_city->take(5)->get(),
            'nextPage' => ParserUrlList::where('id', '>', $card->id)->where('status', 3)->first()
        ])->render();
        return $this->renderBasic();
    }
    public function cardua($id)
    {
        $card = ParserUrlList::findOrFail($id);
        $this->content = view('site.auto.card.ua')->with(['card' => $card])->render();
        return $this->renderBasic();
    }

    public function favoriteru(){

        $this->content = view('site.auto.favorite.ru')->render();
        return $this->renderBasic();
    }

    public function favoriteua(){

        $this->content = view('site.auto.favorite.ua')->render();
        return $this->renderBasic();
    }

    public function presentationru(){

        $this->content = view('site.auto.presentation.ru')->render();
        return $this->renderBasic();
    }

    public function presentationua()
    {

        $this->content = view('site.auto.presentation.ua')->render();
        return $this->renderBasic();
    }

    public function faqru()
    {

        $this->content = view('site.auto.faq.ru')->render();
        return $this->renderBasic();
    }

    public function faqua()
    {

        $this->content = view('site.auto.faq.ua')->render();
        return $this->renderBasic();
    }

    public function aboutru()
    {

        $this->content = view('site.auto.about.ru')->render();
        return $this->renderBasic();
    }

    public function aboutua()
    {

        $this->content = view('site.auto.about.ua')->render();
        return $this->renderBasic();
    }

    public function confidentialityru()
    {

        $this->content = view('site.auto.confidentiality.ru')->render();
        return $this->renderBasic();
    }

    public function confidentialityua()
    {

        $this->content = view('site.auto.confidentiality.ua')->render();
        return $this->renderBasic();
    }

    public function conventionru()
    {

        $this->content = view('site.auto.convention.ru')->render();
        return $this->renderBasic();
    }

    public function conventionua()
    {

        $this->content = view('site.auto.convention.ua')->render();
        return $this->renderBasic();
    }

    public function marksru()
    {

        $this->content = view('site.auto.marks.ru')->render();
        return $this->renderBasic();
    }

    public function marksua()
    {

        $this->content = view('site.auto.marks.ua')->render();
        return $this->renderBasic();
    }

    public function catbodyru()
    {

        $this->content = view('site.auto.catbody.ru')->render();
        return $this->renderBasic();
    }

    public function catbodyua()
    {

        $this->content = view('site.auto.catbody.ua')->render();
        return $this->renderBasic();
    }

    public function changelogru()
    {

        $this->content = view('site.auto.changelog.ru')->render();
        return $this->renderBasic();
    }

    public function changelogua()
    {

        $this->content = view('site.auto.changelog.ua')->render();
        return $this->renderBasic();
    }

    public function updateru()
    {

        $this->content = view('site.auto.update.ru')->render();
        return $this->renderBasic();
    }

    public function updateua()
    {

        $this->content = view('site.auto.update.ua')->render();
        return $this->renderBasic();
    }

    public function status404ru()
    {

        return view('site.auto.status.404.ru')->render();

    }

    public function status404ua()
    {

        return view('site.auto.status.404.ua')->render();

    }

    public function status500ru()
    {

        return view('site.auto.status.500.ru')->render();

    }

    public function status500ua()
    {

        return view('site.auto.status.500.ua')->render();

    }

    public function status503ru()
    {

        return view('site.auto.status.503.ru')->render();

    }

    public function status503ua()
    {

        return view('site.auto.status.503.ua')->render();

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    protected $min = null;

    protected $error_list = [
        'ru' => [
            'min' => 'Количество символов в поле :atribute не может быть меньше :value.',
            'max' => 'Количество символов в поле :atribute не может быть больше :value.',
            'null' => 'Поле :atribute не может быть пустым.',
            'wrong' => 'Введите действительный :atribute.',
        ]
    ];

    public function verify(Request $request){
        $return_data = [];
        switch ($request->type){
            case 'first_name':
                $return_data = $this->validateString($request->data, 'Имя', 'ru', 2, 30, false);
                break;
            case 'last_name':
                $return_data = $this->validateString($request->data, 'Фамилия', 'ru', 2, 40, false);
                break;
            case 'tel':
                $return_data = $this->validateString($request->data, 'Телефон', 'ru', 12, 12, false);
                break;
            case 'email':
                $return_data = $this->validateString($request->data, 'E-mail', 'ru', 5, 60, false, true);
                break;
            case 'country':
                $return_data = $this->validateString($request->data, 'Страна', 'ru', 2, 40, false);
                break;
            case 'city':
                $return_data = $this->validateString($request->data, 'Город', 'ru', 2, 40, false);
                break;
        }
        return response()->json($return_data['alert'], $return_data['status']);
    }

    private function validateString($model, $atribute, $lang, $min, $max, $can_empty, $is_email = false)
    {

        if(mb_strlen($model) == 0) {
            $str_replaced = str_replace(':atribute', $atribute, $this->error_list[$lang]['null']);
            return [
                'status' => 400,
                'alert' => $str_replaced,
            ];
        }
        elseif(mb_strlen($model) < $min) {
            $str_mware = str_replace(':atribute', $atribute, $this->error_list[$lang]['min']);
            $str_replaced = str_replace(':value', $min, $str_mware);
            return [
                'status' => 400,
                'alert' => $str_replaced,
            ];
        }elseif(mb_strlen($model) > $max) {
            $str_mware = str_replace(':atribute', $atribute, $this->error_list[$lang]['max']);
            $str_replaced = str_replace(':value', $max, $str_mware);
            return [
                'status' => 400,
                'alert' => $str_replaced,
            ];
        }
        else{
            if($is_email){
                if (!filter_var($model, FILTER_VALIDATE_EMAIL)) {
                    $str_replaced = str_replace(':atribute', $atribute, $this->error_list[$lang]['wrong']);
                    return [
                        'status' => 400,
                        'alert' => $str_replaced,
                    ];
                }
            }
            return [
                'status' => 200,
                'alert' => null,
            ];
        }
    }
}

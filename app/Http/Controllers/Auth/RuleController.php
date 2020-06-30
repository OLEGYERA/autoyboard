<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
            'unique' => 'Пользователь с таким :atribute уже существует.',
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
                $return_data = $this->validateString($request->data, 'Телефон', 'ru', 12, 12, false, 'tel');
                break;
            case 'email':
                $return_data = $this->validateString($request->data, 'E-mail', 'ru', 5, 60, false, 'email');
                break;
        }
        return response()->json($return_data['alert'], $return_data['status']);
    }

    private function validateString($model, $atribute, $lang, $min, $max, $can_empty, $type = null)
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
            switch ($type) {
                case 'email':
                    if (!filter_var($model, FILTER_VALIDATE_EMAIL)) {
                        $str_replaced = str_replace(':atribute', $atribute, $this->error_list[$lang]['wrong']);
                        return [
                            'status' => 400,
                            'alert' => $str_replaced,
                        ];
                    } elseif (!empty(User::where('email', $model)->first())) {
                        $str_replaced = str_replace(':atribute', $atribute, $this->error_list[$lang]['unique']);
                        return [
                            'status' => 400,
                            'alert' => $str_replaced,
                        ];
                    }
                    break;
                case 'tel':
                    if (!empty(User::where('tel', $model)->first())) {
                        $str_replaced = str_replace(':atribute', $atribute . 'ом', $this->error_list[$lang]['unique']);
                        return [
                            'status' => 400,
                            'alert' => $str_replaced,
                        ];
                        break;
                    }
            }
            return [
                'status' => 200,
                'alert' => null,
            ];
        }
    }
}

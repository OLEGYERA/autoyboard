<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Cookie;
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
            'unUnique' => 'Пользователя с таким :atribute не существует.',

        ]
    ];

    public function __construct()
    {
        $this->middleware('throttle:6,1')->only('validateCode');
    }

    public function verify(Request $request){
        $return_data = [];
        switch ($request->alias){
            case 'first_name':
                $return_data = $this->validateString($request->model, 'Имя', 'ru', 2, 30);
                break;
            case 'last_name':
                $return_data = $this->validateString($request->model, 'Фамилия', 'ru', 2, 40);
                break;
            case 'tel':
                $return_data = $this->validateString($request->model, 'Телефон', 'ru', 12, 12);
                if($return_data['status'] == 200)
                    $return_data = $this->validateTel($request->model, 'Телефон', 'ru', $request->unique);
                break;
            case 'email':
                $return_data = $this->validateString($request->model, 'E-mail', 'ru', 5, 60);
                if($return_data['status'] == 200)
                    $return_data = $this->validateEmail($request->model, 'E-mail', 'ru', $request->unique);
                break;
        }
        return response()->json($return_data['alert'], $return_data['status']);
    }

    public function validateCode(Request $request){
        $status = 200;
        $alert = null;

        if(empty(User::where('id', $request->user)->where('remember_token', $request->model)->first())){
            $status = 400;
            $alert = str_replace(':atribute', 'код проверки', $this->error_list['ru']['wrong']);
        }

        return response()->json($alert, $status);
    }

    private function validateString($model, $atribute, $lang, $min, $max)
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
            return [
                'status' => 200,
                'alert' => null,
            ];
        }
    }

    private function validateTel($model, $atribute, $lang, $unique){
        $status = 200;
        $alert = null;
        if ($unique){
            if(!empty(User::where('tel', $model)->first())){
                $status = 418;
                $alert = str_replace(':atribute', $atribute, $this->error_list[$lang]['unique']);
            }
        }else{
            if(empty(User::where('tel', $model)->first())){
                $status = 418;
                $alert = str_replace(':atribute', $atribute, $this->error_list[$lang]['unUnique']);
            }
        }

        return [
            'status' => $status,
            'alert' => $alert,
        ];
    }

    private function validateEmail($model, $atribute, $lang, $unique){
        $status = 200;
        $alert = null;
        if (!filter_var($model, FILTER_VALIDATE_EMAIL)) {
            $status = 400;
            $alert = str_replace(':atribute', $atribute, $this->error_list[$lang]['wrong']);
        }elseif ($unique){
            if(!empty(User::where('email', $model)->first())){
                $status = 418;
                $alert = str_replace(':atribute', $atribute, $this->error_list[$lang]['unique']);
            }
        }else{
            if(empty(User::where('email', $model)->first())){
                $status = 418;
                $alert = str_replace(':atribute', $atribute, $this->error_list[$lang]['unUnique']);
            }
        }

        return [
            'status' => $status,
            'alert' => $alert,
        ];
    }
}

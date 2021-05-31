<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
{
    /**
     * @var
     */
    protected $action;

    /**
     * ThreadRequest constructor.
     * @param $action
     */
    public function __construct($action){
        $this->action = $action;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->action == "store"){
            $rules = [
                'channel_id' => "required|exists:channels,id",
                'title'   => "required|min:3|max:100",
                'body'    => "required|min:10|max:500"
            ];
        }elseif($this->action == "update"){
            $rules = [];
        }
        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\MustHasFiveShortcutLink;
use Illuminate\Foundation\Http\FormRequest;

class ShortcutLinkRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>(is_null(request('shortcutLink'))) ? ["required",new MustHasFiveShortcutLink(auth()->user())] : "required",
            "link"=>"required"
        ];
    }
    public function attributes()
    {
        return [
            "name"=>__("general.Name"),
            "link"=>__("general.Link"),
        ];
    }
}

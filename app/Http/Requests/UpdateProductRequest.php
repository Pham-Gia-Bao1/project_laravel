<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'size' => 'required|in:Large,Medium,Extra',
            'weight' => 'required|',
            'price' => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'reviews' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
            'quantity' => 'required|numeric|min:1',
            //'coffee_shop_id' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'Please enter name product',
                'name.string' => 'The name must be a string!',
                'name.min' => 'The name must be at least 3 characters',
                'name.max' => 'The maximum of the name is 255 characters',
                'size.required' => 'Please choose size!',
                'weight.required' => 'Please enter the weight',
                'price.required' => 'Please enter the prize',
                'price.numeric' => 'The prize must be a number!',
                'image.required' => 'Please upload an image!',
                'image.image' => 'The file must be an image file.',
                'image.mimes' => 'Image must be one of these kinds: jpeg, png, jpg, gif.',
                'image.max' => 'Image can be bigger than 2MB.',
                'rating.required' => 'Please rate 1 to 5.',
                'reviews.required' => 'Please review for this product!',
                'reviews.string' => 'The review feild must be a string!',
                'quantity.required' => 'Please select the quantity!',
                //'coffee_shop_id.required' => 'Please choose the name of coffe shop.',
                'category_id.required' => 'Please choose the category.',
            ];
    }
}

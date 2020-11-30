<?php

namespace App\Rules;

use App\Models\AttributeTranslation;
use Illuminate\Contracts\Validation\Rule;

class UniqueProductName implements Rule
{

    private $productName;
    private $productId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($productName, $productId)
    {
        $this->productName = $productName;
        $this->productId = $productId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $product
     * @param mixed $value
     * @return bool
     */
    public function passes($product, $value)
    {
        if($this -> productId) //edit form
            $product = AttributeTranslation::where('name', $value)->where('product_id','!=',$this->productId) -> first();
        else  //creation form
            $product = AttributeTranslation::where('name', $value)->first();

        if ($product)
            return false;
        else
            return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ' this name already exists  before';
    }
}

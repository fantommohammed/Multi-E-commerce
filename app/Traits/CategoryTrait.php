<?php

namespace App\Http\Traits;
use App\Models\Category;

trait CategoryTrait {
    public function index() {
        $category = Category::orderBy('id','DESC')->find($id);
        if (!$category)
            return redirect()->route('dashboard.maincategories')->with(['error' => 'هذا القسم غير موجود ']);
    }
}

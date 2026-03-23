<?php

namespace App\Controllers;

class ProductPages extends BaseController
{
    public function drop26()
    {
        return view('collections/local/drop26', [
            'title' => 'Drop 26 - Nonchalant'
        ]);
    }
        public function drop25()
    {
        return view('collections/local/drop25', [
            'title' => 'Drop 25 - Nonchalant'
        ]);
    }

    public function ddd()
    {
        return view('collections/collab/DDD', [
            'title' => 'Collab DDD - Nonchalant'
        ]);
    }

    public function manga26()
    {
        return view('collections/collab/Manga26', [
            'title' => 'Collab Manga 26 - Nonchalant'
        ]);
    }
}

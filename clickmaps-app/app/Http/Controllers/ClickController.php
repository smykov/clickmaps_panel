<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClickRequest;
use App\Models\Clickmap;

class ClickController extends Controller
{

    public function store(ClickRequest $request)
    {
        return Clickmap::create($request->validated());
    }
}

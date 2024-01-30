<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LocaleController extends Controller
{
    public function locale(string $locale)
    {
        $userId = Auth::id();
        App::setLocale($locale);
        User::findOrfail($userId)->update(['locale' => $locale]);
        return redirect()->back();
    }
}

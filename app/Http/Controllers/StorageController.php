<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function Dashboard(){
        return view('admin\Storage\dashboard');
    }
    
    public function MethodViewStorage(){
        return view('admin\forms\StorageModule\view');
    }

    public function MethodCreateStorage(){
        return view('admin\forms\StorageModule\create');
    }

    public function MethodEditStorage(){
        return view('admin\forms\StorageModule\edit');
    }
}

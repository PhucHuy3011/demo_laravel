<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MylayoutController extends Controller
{
    public function index()
    {
        return view('layout/admin');
    }
    public function index2()
    {
        return view('layout/user');
    }
    public function list()
    {
        $data = [
            'users' => User::get()
        ];
        return view('admin/user/list')->with($data);
    }
    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/user/list');
    }
    public function edit($id)
    {
        $data = [
            'user' => User::find($id)
        ];
        return view('admin/user/edit')->with($data);
    }
    public function update(Request $request)
    {
        $user = $request->input();
        unset($student['_token']);
        User::where('id', $user['id'])->update($user);
        return redirect('admin/user/list');
        
    }
    public function searchByKeyword(Request $request)
    {
        $keyword = $request->get('keyword');
        $data = [
            'users' => User::where('name', 'like', '%' . $keyword . '%')->get(),
            'keyword' => $keyword
        ];
        return view('admin/user/list')->with($data);
    }
    public function widgets()
    {
        return view('admin/widgets/widgets');
    }
    

}

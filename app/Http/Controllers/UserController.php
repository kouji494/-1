<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        Log::info('ユーザー一覧画面にアクセスしました');

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        Log::info('ユーザー登録フォームを表示しました');

        return view('users.create');
    }

    public function store(Request $request)
    {
        Log::info('ユーザー登録処理を開始しました');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Log::info('ユーザー登録が完了しました', [
            'user_id' => $user->id,
        ]);

        return redirect('/users');
    }
}

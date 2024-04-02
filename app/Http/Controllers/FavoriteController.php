<?php

namespace App\Http\Controllers;

use App\Models\Coffe;
use Illuminate\Http\Request;
use App\Models\FavoriteList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        // Kết hợp hai truy vấn lại
        $favorites = DB::table('favorites')
            ->join('coffe', 'favorites.product_id', '=', 'coffe.id')
            ->select('coffe.*')
            ->where('favorites.user_id', $user_id)
            ->limit(3)
            ->get();

        // Lấy số lượng sản phẩm yêu thích dựa trên user_id
        $favoriteCount = FavoriteList::where('user_id', $user_id)->count();

        return view('/header', compact('favorites', 'favoriteCount'));
    }

    public function viewAll($userId)
    {
        // Lấy tất cả các sản phẩm khi người dùng nhấn view all
        $favorites = FavoriteList::where('user_id', $userId)
            ->with('coffe')
            ->get();

        return view('CheckOut', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\slidesshow;
use App\Helpers\UploadFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class SlidesshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slidesShow=slidesshow::all();
        return response()->json([
            'message'   => 'Lấy danh sách slidesShow thành công!',
            'code'      => 200,
            'data'      => $slidesShow
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $slidesShow = new slidesshow;
        if ($req->hasFile('slidesshow_1') && $req->file('slidesshow_1')->isValid()) {
            $img = $req->slidesshow_1;
            $nameFile = UploadFile::uploadImg($img, 'slidesshow', 'slidesshow_1');
            slidesshow::whereId($slidesShow->id)->update(['slidesshow_1' => $nameFile]);
        }
        if ($req->hasFile('slidesshow_2') && $req->file('slidesshow_2')->isValid()) {
            $img = $req->slidesshow_2;
            $nameFile = UploadFile::uploadImg($img, 'slidesshow', 'slidesshow_2');
            slidesshow::whereId($slidesShow->id)->update(['slidesshow_2' => $nameFile]);
        }
        if ($req->hasFile('slidesshow_3') && $req->file('slidesshow_3')->isValid()) {
            $img = $req->slidesshow_3;
            $nameFile = UploadFile::uploadImg($img, 'slidesshow', 'slidesshow_3');
            slidesshow::whereId($slidesShow->id)->update(['slidesshow_3' => $nameFile]);
        }
        $slidesShow->save();
        return response()->json([
            'message_vn'    => 'Thêm slidesshow thành công',
            'code'          => 200,
            'data'          => $slidesShow
        ]);
        


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

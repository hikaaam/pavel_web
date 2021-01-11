<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use Illuminate\Http\Request;

class TblUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = tbl_user::all();
            $message = "success";
            $status = "ok";
        } catch (\Throwable $th) {
            $data = $th;
            $message="failed";
            $status="error";
        }
       
       $kirim = [
           "status"=>$status,
            "msg"=>$message,
            "data"=>$data
       ];
       return $kirim;
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
        $password = md5($request->password);
        try {
            $data = tbl_user::where("email",$request->email)->where("password",$password)->get();
            if(count($data)>=1){      
                $message = "success";
                $status = "ok";
            }else{
                $message = "Maaf Password atau Email Anda Salah";
                $status = "error";
            }
        } catch (\Throwable $th) {
            $data = $th;
            $message="failed";
            $status="error";
        }
       
       $kirim = [
           "status"=>$status,
            "msg"=>$message,
            "data"=>$data
       ];
       return $kirim;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_user  $tbl_user
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_user $tbl_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_user  $tbl_user
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_user $tbl_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_user  $tbl_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_user $tbl_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_user  $tbl_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_user $tbl_user)
    {
        //
    }

    public function simpan(Request $request)
    {
        $password = md5($request->password);
        $nama = $request->nama;
        $email = $request->email;
        $foto = "https://i.ytimg.com/vi/jSNUmL9oo2A/hqdefault.jpg";
        if($email == "andrenuryana@gmail.com"){
           $foto = "https://i.ibb.co/HGN5GR2/github.png";
        } 
        $data = ["nama"=>$nama,"email"=>$email,"foto"=>$foto,"password"=>$password];
        try {
            tbl_user::create($data);
              
                $message = "success";
                $status = "ok";
          
        } catch (\Throwable $th) {
            $data = $th;
            $message="failed";
            $status="error";
        }
       
       $kirim = [
           "status"=>$status,
            "msg"=>$message,
            "data"=>$data
       ];
       return $kirim;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\jabatan;
use App\pangkat;
use App\digit3;
use App\digit2;
use App\spesifik;
use App\peneliti;
use App\User;


use Input;
use Redirect;
use Response;
class backendController extends masterController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function tambahpeneliti(){
          // $edit = (isset($_GET['edit'])?$_GET['edit']:0);
        $list_spesifik = [];
        $digit2['pilih digit3']['-------------'] = "-------------" ;
        $id = (isset($_GET['id'])?$_GET['id']:0);
        $edit = peneliti::with('pakar_spesifik','pakar_spesifik.pakar_digit3','pakar_spesifik.pakar_digit3.pakar_digit2')->find($id);
        if($edit)
        $edit->spesifik_item = spesifik::where('digit3',$edit->pakar_spesifik->pakar_digit3->id)->get();

        $jabatan = jabatan::all();
        $pangkat = pangkat::all();
        $digit2_list = digit2::with('pakar_digit3')->get();
        foreach ($digit2_list as $i=>$d){
            foreach ($d->pakar_digit3 as $j=>$dg3){
                $digit2[$d->nama][$dg3->id] = $dg3->nama;
            }
        }
        if($edit)
        foreach ($edit->spesifik_item as $key => $value) {
            $list_spesifik[$value->id] = $value->nama;
        }

        return view('admin.peneliti',compact('jabatan','pangkat','digit2','list_spesifik','edit'));
    }
    public function tambahpenelitiproses(){

        if(Input::get('id')){
            $data = peneliti::find( Input::get('id'));
        }else{
            $data = new peneliti;
        }

        $data->nama = Input::get('nama');
        $data->nip = Input::get('nip');
        $data->pangkat = Input::get('pangkat');
        $data->jabatan = Input::get('jabatan');
        $data->pendidikan = Input::get('pendidikan');
        $data->spesifik = Input::get('spesifik');
        $data->pensiun = Input::get('pensiun').'-01 00:00:00';
        $data->save();
        // print_r($data);
        // die();
        return Redirect::to('/peneliti');

    }
    public function tambahjabatanproses(){
        if(Input::get('id')){
            $data = jabatan::find( Input::get('id'));
        }else{
            $data = new jabatan;
        }
        $data->nama = Input::get('nama');
        $data->save();
        return Redirect::to('/jabatan');
    }
    public function tambahjabatan(){
        $id = (isset($_GET['id'])?$_GET['id']:0);
        $edit = jabatan::find($id);
        return view('admin.jabatan',compact('edit'));
    }
    public function tambahpangkatproses(){
        if(Input::get('id')){
            $data = pangkat::find( Input::get('id'));
        }else{
            $data = new pangkat;
        }
        $data->nama = Input::get('nama');
        $data->save();
        return Redirect::to('/pangkat');
    }
    public function tambahpangkat(){
        $id = (isset($_GET['id'])?$_GET['id']:0);
        $edit = pangkat::find($id);

        return view('admin.pangkat',compact('edit'));
    }

    public function tambahdigit2proses(){
         if(Input::get('id')){
            $data = digit2::find( Input::get('id'));
        }else{
            $data = new digit2;
        }
        $data->nama = Input::get('nama');
        $data->save();
        return Redirect::to('/digit2');
    }
    public function tambahdigit2(){
        $id = (isset($_GET['id'])?$_GET['id']:0);
        $edit = digit2::find($id);
        return view('admin.digit2',compact('edit'));
    }
    public function tambahdigit3proses(){
        if(Input::get('id')){
            $data = digit3::find( Input::get('id'));
        }else{
            $data = new digit3;
        }
        $data->nama = Input::get('nama');
        $data->digit2 = Input::get('digit2');
        $data->save();
        return Redirect::to('/digit3');
    }
    public function tambahdigit3(){
        $id = (isset($_GET['id'])?$_GET['id']:0);
        $edit = digit3::with('pakar_digit2')->find($id);

        $digit2 = digit2::all();
        return view('admin.digit3',compact('digit2','edit'));
    }
    public function tambahspesifikproses(){
        $data = new spesifik;
        $data->nama = Input::get('nama');
        $data->digit3 = Input::get('digit3');
        $data->save();
        return Redirect::to('/spesifik');
    }
    public function tambahspesifik(){
        $id = (isset($_GET['id'])?$_GET['id']:0);
        $edit = spesifik::with('pakar_digit3','pakar_digit3.pakar_digit2')->find($id);

        $digit2 = digit2::with('pakar_digit3')->get();
        return view('admin.spesifik',compact('digit2','edit'));
    }
    public function ajaxSpesifik()
    {
        $data = spesifik::where('digit3',$_GET['digit3'])->get();

        return Response::json($data,200);
    }
    public function delete(){
        switch ($_GET['mode']) {
            case 'peneliti':
                peneliti::destroy($_GET['id']);
                break;
            case 'digit2':
                digit2::destroy($_GET['id']);
                break; 
            case 'digit3':
                digit3::destroy($_GET['id']);
                break; 
            case 'spesifik':
                spesifik::destroy($_GET['id']);
                break; 
            case 'jabatan':
                jabatan::destroy($_GET['id']);
                break; 
            case 'pangkat':
                pangkat::destroy($_GET['id']);
                break; 
            case 'user':
                User::destroy($_GET['id']);
                break; 
            default:
                # code...
                break;
        }

        return Redirect::back();
    }
    public function user(){
        $data = User::all();
        // print_r($data);
        // die();
        return view('admin.user',compact('data'));
    }
    public function tambahuser(){
        $id = (isset($_GET['id'])?$_GET['id']:0);
        $edit = User::find($id);
        return view('admin.tambahuser',compact('edit'));

    }
    public function tambahuserproses(){
        if(Input::get('id')){
            $data = User::find( Input::get('id'));
            if(Input::get('password')){
                $data->password = bcrypt(Input::get('password'));

            }
        }else{
            $data = new User;
            $data->password = bcrypt(Input::get('password'));

        }

        $data->name = Input::get('name');
        $data->email = Input::get('email');
        $data->save();
        return Redirect::to('/admin/user');


    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

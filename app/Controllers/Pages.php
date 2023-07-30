<?php

namespace App\Controllers;

class pages extends BaseController
{
    public function index()
    {
        $data=[
            'title'=>'web | Perpustakaan Skanic',
        ];
      
        return view('pages/home', $data);
      
    }
    public function about()
    {

        $data=[
            'title'=>'web | Perpustakaan Skanic',
        ]; 
        return view('pages/about', $data);
    }
public function contact()
{  
    $data=[
        'title'=>'web | Perpustakaan Skanic',
        'alamat'=>[
            [
                'tipe'=>'Rumah',
                'alamat'=>'Jln. Raya Laladon ',
                'kab'=>'Bogor barat',
                'provinsi'=>'jawa barat'
            ],
        [
            'tipe'=>'Sekolah',
            'alamat'=>'Jl. Raya Laladon  ',
            'kab'=>'Bogor',
            'provinsi'=>'jawa barat'
          ]
        ]
    ];
    return view('pages/contact',$data);
}
}

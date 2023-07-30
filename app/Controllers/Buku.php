<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
       // $db=\config\Database::connect();
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_buku')? $this->request->getVar('page_buku'): 1;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $buku = $this->bukuModel->search($keyword);
        } else {
            $buku = $this->bukuModel;
        }
        //$buku = $this->bukuModel->findAll();
        $data= [
            'title' => 'Daftar Buku',
            'buku' => $buku->paginate(5, 'buku'),
            'pager' => $this->bukuModel->pager,
            'currentPage' => $currentPage
        ];
        return view('buku/index', $data);
    }

    public function create()
    {
        //session();
        $data = [
            'title' => 'Tambah data',
            'validation' => \Config\Services::validation()
        ];
        return view('buku/create', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel->getBuku($slug)
        ];
        return view('buku/detail',$data);
    }
    public function save()
    {
        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'kelas' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'penulis' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'penerbit' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'sampul' => [
                'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Yang Anda Pilih bukan Gambar',
                    'mime_in' => 'Yang Anda Pilih bukan Gambar'
                ]
            ]
                
        ])) 
        {
            // $validation = \Config\Services::validation();
            // return redirect()->to('create')->withInput()->with('validation', $validation);
            return redirect()->to('create')->withInput();
        }
        
        //ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        //apakah tidak ada gambar yg di upload
        if($fileSampul->getError() == 4) {
        $namaSampul = 'download.jpg';
        } else {
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
          //pindahkan file ke folder img
          $fileSampul->move('img', $namaSampul);
        }
     

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/buku');
    }
    public function delete($id)
    {
         //cari gambar
   $buku = $this->bukuModel->find($id);
   //cek jika gambar file default.jpg
   if($buku['sampul'] != 'download.jpg') {
       //hapus gambar
//   unlink('img/' . $buku['sampul']);
   }
         $this->bukuModel->delete($id);
         session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
         return redirect()->to('buku');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug)
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
        if($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[buku.judul]';
        }
        if(!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'kelas' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'penulis' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'penerbit' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
            'sampul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah di isi'
                ]
                ],
                'sampul' => [
                    'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                     
                        'is_image' => 'Yang Anda Pilih bukan Gambar',
                        'mime_in' => 'Yang Anda Pilih bukan Gambar'
                    ]
                ]
        ])) 
        {
            //$validation = \Config\Services::validation();
            return redirect()->to('/buku/edit/' .$this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');
        //cek gambar apakah tetap gambar lama
        if($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
          //generate nama file
          $namaSampul = $fileSampul->getRandomName();
          //pindahkan gambar
          $fileSampul->move('img', $namaSampul);
          //hapus file yg lama
          unlink('img/' . $this->request->getVar('sampulLama'));  
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/buku');
    }
}

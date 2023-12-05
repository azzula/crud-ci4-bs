<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
    * index function
    */
    public function index()
    {
        //model initialize
        $postModel = new Post();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'posts' => $postModel->paginate(2, 'post'),
            'pager' => $postModel->pager
        );

        return view('index', $data);
    }

    /**
    * create function
    */
    public function create()
    {
        return view('create');
    }

    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);
         
        //define validation
        $validation = $this->validate([
            'title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul'
                ]
            ],
            'content'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Konten'
                ]
            ],
        ]);

        if(!$validation) {
            //render view with error validation message
            return view('create', [
                'validation' => $this->validator
            ]);
        } else {
            //model initialize
            $postModel = new Post();
            
            //insert data into database
            $postModel->insert([
                'title'   => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Disimpan!');

            return redirect()->to(base_url('post'));
        }
    }

    /**
    * edit function
    */
    public function edit($id)
    {
        //model initialize
        $postModel = new Post();

        $data = array(
            'post' => $postModel->find($id)
        );

        return view('update', $data);
    }

    /**
     * update function
     */
    public function update($id)
    {
        //load helper form and URL
        helper(['form', 'url']);
         
        //define validation
        $validation = $this->validate([
            'title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul'
                ]
            ],
            'content'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Konten'
                ]
            ],
        ]);

        if(!$validation) {
            //model initialize
            $postModel = new Post();

            //render view with error validation message
            return view('update', [
                'post' => $postModel->find($id),
                'validation' => $this->validator
            ]);
        } else {
            //model initialize
            $postModel = new Post();
            
            //insert data into database
            $postModel->update($id, [
                'title'   => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Diperbarui!');

            return redirect()->to(base_url('post'));
        }
    }

    /**
    * remove function
    */
    public function remove($id)
    {
        //model initialize
        $postModel = new Post();

        $data = array(
            'post' => $postModel->find($id)
        );

        return view('delete', $data);
    }

    /**
    * delete function
    */
    public function delete($id)
    {
        //model initialize
        $postModel = new Post();

        $post = $postModel->find($id);

        if($post) {
            $postModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Dihapus!');

            return redirect()->to(base_url('post'));
        }
    }
}

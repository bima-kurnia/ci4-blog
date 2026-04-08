<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Post extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $data['posts'] = $this->postModel->findAll();
        return view('posts/index', $data);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required|min_length[3]',
            'content' => 'required',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]'
        ]);

        if(!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $image = $this->request->getFile('image');

        $imageName = null;
        if($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();

            // MOVE TO public/uploads
            $image->move(FCPATH . 'uploads', $imageName);
        }

        $this->postModel->save([
            'title' => $title,
            'slug' => url_title($title, '-', true),
            'content' => $this->request->getPost('content'),
            'user_id' => session()->get('user_id'),
            'image' => $imageName
        ]);

        return redirect()->to('/posts');
    }

    public function edit($id)
    {
        $data['post'] = $this->postModel->find($id);
        return view('posts/edit', $data);
    }

    public function update($id)
    {
        $title = $this->request->getPost('title');

        $this->postModel->update($id, [
            'title' => $title,
            'slug' => url_title($title, '-', true),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/posts');
    }

    public function delete($id)
    {
        $this->postModel->delete($id);
        return redirect()->to('/posts');
    }

    //
    // API
    //
    // GET semua artikel
    public function apiIndex()
    {
        $posts = $this->postModel->orderBy('created_at', 'DESC')->findAll();

        return $this->response->setStatusCode(200)->setJSON($posts);
    }

    // GET artikel by ID
    public function apiDetail($id)
    {
        $post = $this->postModel->find($id);

        if(!$post) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Artikel tidak ditemukan']);
        }

        return $this->response->setStatusCode(200)->setJSON($post);
    }

    // POST artikel baru
    public function apiCreate()
    {
        $data = $this->request->getJSON(true);

        if(!$data || !isset($data['title'], $data['content'])) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Data tidak lengkap']);
        }

        $this->postModel->save([
            'title' => $data['title'],
            'slug' => url_title($data['title'], '-', true),
            'content' => $data['content'],
            'user_id' => $data['user_id'] ?? 1
        ]);

        return $this->response->setStatusCode(201)->setJSON(['message' => 'Artikel berhasil dibuat']);
    }
    //
}

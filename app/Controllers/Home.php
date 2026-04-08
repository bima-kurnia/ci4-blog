<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $data['posts'] = $this->postModel
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        $pager = $this->postModel->pager;
        $data['pager'] = $pager;

        return view('home/index', $data);
    }

    public function detail($slug)
    {
        $data['post'] = $this->postModel->where('slug', $slug)->first();

        if (!$data['post']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
        }

        return view('home/detail', $data);
    }

    public function category($slug)
    {
        $categoryModel = new \App\Models\CategoryModel();
        $category = $categoryModel->where('slug', $slug)->first();

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        $data['posts'] = $this->postModel->where('category_id', $category['id'])->paginate(6);
        $data['category'] = $category;

        $pager = $this->postModel->pager;
        $data['pager'] = $pager;

        return view('home/category', $data);
    }

    public function search()
    {
        $keyword = $this->request->getGet('q');

        $data['posts'] = $this->postModel
            ->like('title', $keyword)
            ->orLike('content', $keyword)
            ->paginate(6);

        $data['keyword'] = $keyword;

        $pager = $this->postModel->pager;
        $data['pager'] = $pager;

        return view('home/search', $data);
    }
}

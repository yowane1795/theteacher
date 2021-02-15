<?php

namespace App\Controllers;

use App\Http\HttpRequest;
use App\Models\Post;

class AdminController extends Controller
{

    public function index()
    {
        $this->isAdmin();
        $posts = (new Post($this->getDB()))->findAll();
        return $this->view('admin.index', compact('posts'));
    }

    public function destroy(HttpRequest $request)
    {
        if ($this->isAdmin()) {
            $id = (int)$request->name('id');

            $result = (new Post($this->getDB()))->destroy($id);

            if ($result) {
                header("Location: /posts/store?success=true");
            }
        }
    }

    public function create()
    {
        $this->isAdmin();
        return $this->view('admin.create');
    }

    public function createPost(HttpRequest $request)
    {
        if ($this->isAdmin()) {

            $values = $request->validator([
                "title" => ["required"],
                "content" => ["required"],
                "slug" => ["required"]
            ]);

            if ($values) {

                $image = $request->loaderFiles('upload', 'assets/img/loaders/', ['.png', '.JPG', '.PNG', '.jpg', '.JPEG', '.jpeg']);
                if ($image) {
                    $data = array_merge_recursive($values, ["upload" => "public/$image"]);

                    $result = (new Post($this->getDB()))->create($data);
                    if ($result) {
                        header("Location: /posts/store?success=true");
                    }
                } else {
                    $request->errors('errors', 'upload', 'Format is not valid');
                }
            }
        }
    }

    public function update(int $id)
    {
        $this->isAdmin();
        $post = (new Post($this->getDB()))->findById($id);

        return $this->view('admin.update', compact("post"));
    }

    public function updatePost(HttpRequest $request)
    {
        if ($this->isAdmin()) {
            $values = $request->validator([
                'title' => ["required"],
                'content' => ["required"]
            ]);
            if ($values) {
                $image = $request->loaderFiles('upload', 'assets/img/loaders/', ['.png', '.JPG', '.PNG', '.jpg', '.JPEG', '.jpeg']);

                if ($image) {

                    $id = (int) array_pop($values);
                    $values['upload'] = "public/$image";
                    $result = (new Post($this->getDB()))->update($values, $id);

                    if ($result) {
                        header("Location: /posts/store?success=true");
                    }
                } else {
                    $request->errors('errors', 'upload', 'Format is not valid');
                }
            }
        }
    }
}

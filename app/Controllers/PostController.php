<?php
namespace App\Controllers;

use App\Http\HttpRequest;
use App\Models\Post;

class PostController extends Controller{

    public function welcome()
    {
        return $this->view('monsite.welcome');
    }

    public function index()
    {
        $posts = (new Post($this->getDB()))->findAll();
        return $this->view('monsite.index', compact('posts'));
    }

    public function show(int $id)
    {
        if ($this->isConnected()) {
           $post = (new Post($this->getDB()))->findById($id);
            return $this->view('monsite.show', compact('post'));
        }
    }

    public function php()
    {
        $courses = (new Post($this->getDB()))->getCourse('PHP');
        return $this->view('monsite.cours.php', compact('courses'));
    }

    public function bdd()
    {
        $courses = (new Post($this->getDB()))->getCourse('BDD');
        return $this->view('monsite.cours.bdd', compact('courses'));
    }

    public function html()
    {
        $courses = (new Post($this->getDB()))->getCourse('HTML');
        return $this->view('monsite.cours.html', compact('courses'));
    }

    public function js()
    {
        $courses = (new Post($this->getDB()))->getCourse('JS');
        return $this->view('monsite.cours.js', compact('courses'));
    }

    public function exoPhp()
    {
        $courses = (new Post($this->getDB()))->getCourse('PHP');
        return $this->view('monsite.cours.php', compact('courses'));
    }

    public function exoBdd()
    {
        $courses = (new Post($this->getDB()))->getCourse('BDD');
        return $this->view('monsite.cours.bdd', compact('courses'));
    }

    public function exoHtml()
    {
        $courses = (new Post($this->getDB()))->getCourse('HTML');
        return $this->view('monsite.cours.html', compact('courses'));
    }

    public function exoJs()
    {
        $courses = (new Post($this->getDB()))->getCourse('JS');
        return $this->view('monsite.cours.js', compact('courses'));
    }
}
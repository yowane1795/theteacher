<?php

namespace App\Controllers;

use App\Http\HttpRequest;
use App\Models\Comment;
use App\Models\User;
use Session;

class CommentController extends Controller
{

    public function comment(HttpRequest $request)
    {
        $values = $request->validator([
            "username" => ["required"],
            "content" => ["required"]
        ]);

        if ($values) {

            $user = (new User($this->getDB()))->getUser($values['username']);
            $username = $user->username;

            if ($values['username'] === $username && Session::isset('login') === $values['username']) {

                array_shift($values);
                $values['id_user'] = (int) $user->id;
                $values['id_post'] = (int) $values['id_post'];
                
                $result = (new Comment($this->getDB()))->create($values);

                if ($result) {
                   header("Location: /post/".$values['id_post']);
                }

            } else {
                $request->errors('errors', 'username', 'This username is not allowed to comment this post.');
            }
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\User;
use App\Http\HttpRequest;
use Session;

class UserController extends Controller
{

    public function login()
    {
        return $this->view('auth.login');
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
    public function loginPost(HttpRequest $request)
    {
        $result = $request->validator([
            "username" => ["required", "max:10", "min:3"],
            "password" => ["required"]
        ]);

        if ($result) {
            $user = (new User($this->getDB()))->getUser($result['username']);

            if ($user !== false) {
                if (password_verify($result['password'], $user->password)) {
                    if ($result['username'] === $user->username) {
                        $request->session('login', $user->username);
                        $request->session('auth', (int)$user->role);
                        $request->session('id', (int)$user->id);
                        return header("Location: /");
                    }
                } else {
                    $request->errors('errors', 'password', "this password doesn't exist");
                }
            } else {
                $request->errors('errors', 'username', "this username doesn't exist");
            }
        }
    }

    public function subscribe()
    {
        return $this->view('auth.subscribe');
    }

    public function subscribePost(HttpRequest $request)
    {
        $result = $request->validator([
            "username" => ["required", "max:6", "min:3"],
            "password" => ["required"],
            "mail" => ["required"],
            "phone" => ["required"]
        ]);

        if ($result) {
            $user = (new User($this->getDB()))->getUser($result['username']);
            if ($user === false) {

                $mail = (new User($this->getDB()))->getUserMail($result['mail']);

                if ($mail === false) {
                    $result['password'] = password_hash($result['password'], PASSWORD_ARGON2I);

                    $result = (new User($this->getDB()))->create($result);
                    if ($result) {
                        return header("Location: /posts?subscribe=true");
                    }
                } else {
                    $request->errors('errors', 'mail', 'This email already taken');
                }
            } else {
                $request->errors('errors', 'username', 'This username already exists');
            }
        }
    }

    public function show(int $id)
    {
        if ($this->isConnected()) {
            $user = (new User($this->getDB()))->findById((int)Session::isset('id'));
            return $this->view('user.show', compact('user'));
        } else {
            header('Location: /login?connect=false');
        }
    }

    public function destroy(int $id)
    {
        if ($this->isConnected()) {
        }
    }

    public function edit(int $id)
    {
        if ($this->isConnected()) {
            $user = (new User($this->getDB()))->findById((int)Session::isset('id'));
            return $this->view('user.edit', compact('user'));
        }
    }

    public function editPost(HttpRequest $request)
    {
        if ($this->isConnected()) {
            $result = $request->validator([
                'username' => ['required', 'max:10', 'min:3'],
                'phone' => ['required'],
                'mail' => ['required']
            ]);

            if ($result) {

                $id = (int)array_pop($result);
                $user = (new User($this->getDB()))->findById($id);

                if (!empty($result['old']) && !empty($result['password'])) {
                    if (password_verify($result['old'], $user->password)) {

                        unset($result['old']);
                        $result['password'] = password_hash($result['password'], PASSWORD_ARGON2I);
                        $state = (new User($this->getDB()))->update($result, $id);
                        if ($state) {
                            $request->session('login', $result['username']);
                            header('Location: /?success='.$state);
                        }
                    } else {
                        $request->errors('errors', 'old', 'This password is not valid');
                    }
                } else {

                    unset($result['old']);
                    unset($result['password']);
                    $state = (new User($this->getDB()))->update($result, $id);

                    if ($state) {
                        $request->session('login', $result['username']);
                        header('Location: /?success='.$state);
                    }
                }
            }
        }
    }
}

<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index() {

        $session = session();
        if($session->get('logged_in')) {
            $model = new UserModel();

            $data = [
                'user'  => $model->getUser($session->get('id')),
            ];

            echo view('templates/header', $data);
            echo view('templates/nav-bar', $data);
            echo view('users/overview', $data);
            echo view('templates/footer', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }

    public function login() {
        if($this->request->getMethod() == "get") {
            $session = session();
            if($session->get('logged_in')) {
                return redirect()->to('/user');
            }
            return view('users/login');
        } else {
            $model = new UserModel();

            $data =[
                'email'  => $this->request->getVar('email'),
                'password'  => sha1($this->request->getVar('password')),
            ];

            $loginData = $model->login($data);

            if($loginData) {
                $dataSession = [
                    'id' => $loginData['id'],
                    'logged_in' => true
                ];

                $session = session();
                $session->set($dataSession);

                return redirect()->to('/user');
            } else {
                return redirect()->to('/login');
            }
        }
    }

    public function singin() {
        echo view('templates/header');
        echo view('templates/nav-bar');
        echo view('users/sing-in');
        echo view('templates/footer');
    }

    public function create()
    {
        if (! $this->validate([
            'name'         => 'required',
            'password'     => 'required|min_length[6]|max_length[12]',
            'email'        => 'required|valid_email|is_unique[user.email]'
        ]))
        {
            echo view('templates/header');
            echo view('templates/nav-bar');
            echo view('users/sing-in');
            echo view('templates/footer');
        }
        else
        {
            $model = new UserModel();
            $model->save([
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'password'  => sha1($this->request->getVar('password')),
            ]);

            return redirect()->to('/login');
        }
    }

    public function edit()
    {
        $session = session();
        if($session->get('logged_in')) {

            $model = new UserModel();
            $data = [
                'user'  => $model->getUser($session->get('id')),
            ];

            echo view('templates/header');
            echo view('templates/nav-bar');
            echo view('users/edit', $data);
            echo view('templates/footer');
        } else {
            return redirect()->to('/login');
        }
    }

    public function update()
    {
        $session = session();
        if($session->get('logged_in')) {
            if (! $this->validate([
                'name'         => 'required',
                'password'     => 'required|min_length[6]|max_length[12]',
                'email'        => 'required|valid_email'
            ]))
            {
                $model = new UserModel();
                $data = [
                    'user'  => $model->getUser($session->get('id')),
                ];

                echo view('templates/header');
                echo view('templates/nav-bar');
                echo view('users/edit', $data);
                echo view('templates/footer');
            }
            else
            {
                $model = new UserModel();
                $model->save([
                    'id' => $session->get('id'),
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => sha1($this->request->getVar('password')),
                ]);

                return redirect()->to('/user');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    public function delete()
    {
        $session = session();
        if($session->get('logged_in')) {
            $model = new UserModel();
            $model->delete($session->get('id'));
            $session->destroy();
            return redirect()->to('/');
        } else {
            return redirect()->to('/login');
        }
    }
}
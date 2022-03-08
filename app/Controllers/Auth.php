<?php

namespace App\Controllers;
use App\Models\UserModel;
use Config\Services;

class Auth extends BaseController
{
    public function login()
    {
        if (UserModel::authenticate($this->request->getVar('nik'), $this->request->getVar('password')))
        {
            Services::session()->set("nik", $this->request->getVar('nik'));
            return redirect()->to(base_url('/'));
        } else {
            Services::session()->setFlashdata("failed", "Login Failed");
            return redirect()->to(base_url('/login'));
        }
    }

    public function register() {
        if (UserModel::create(
            $this->request->getVar("nik"), 
            $this->request->getVar("password")
        )) {

        } else {
            
        }

    }

    public function logout()
    {
        Services::session()->destroy();
        return redirect()->to(base_url("/"));
    }
}
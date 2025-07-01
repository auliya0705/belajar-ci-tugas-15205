<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Redirect implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Cek apakah user berhasil login
        if (session()->has('isLoggedIn')) {
            return redirect()->to(site_url('contact'));
        }
        // $session = session();
        // if ($session->get('isLoggedIn') && current_url() === base_url('login')) {
        //     return redirect()->to(base_url('contact'));
        // }

        // return $response;
    }
}
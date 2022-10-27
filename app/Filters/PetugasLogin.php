<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class PetugasLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('jabatan')) {
            return redirect()->to(site_url('petugas/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

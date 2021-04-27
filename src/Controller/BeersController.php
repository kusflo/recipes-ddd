<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BeersController extends AbstractController
{

    public function index(Request $request)
    {



        return new Response(<<<EOF
        <html>
            <body>
                <h1>Primera Receta</h1>
            </body>
        </html>
EOF
        );
    }
}

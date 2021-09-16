<?php

namespace App\Tests;

use App\Kernel;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;

class KernelTest extends TestCase
{
    public function testHandle()
    {
        $kernel = new Kernel();
        $request = Request::createFromGlobals();

        $context = new RequestContext();
        $context->fromRequest($request);
        $response = $kernel->handle($request);
        $this->assertEquals(8000, $context->getHttpPort());
        $this->assertEquals(200, $response->getStatusCode(), "Erreur sur le code de statut");
    }
}

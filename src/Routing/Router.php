<?php
namespace App\Routing;

use App\Routing\AbstractRouter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Routing\RouteMapping;

class Router extends AbstractRouter
{
    use RouteMapping;

    public function handleRequest(Request $request): ?Response
    {
        $path = $request->getPathInfo();
        var_dump($path);
        if (isset($this->mapping[$path])) {
            if (self::isHome($path)) {
                return include sprintf('../views/view/home.php');
            }
            $controllerClassName = ucfirst($this->mapping[$path])."Controller::class";
            $controllerClass = $this->mapping[$path]."_controller";
            extract($request->query->all(),EXTR_SKIP);
            include sprintf(__DIR__.'/../Controller/%s.php', $controllerClass);
            return new Response(ob_get_clean());
//            $response = call_user_func(HelloController::class, 'hello', [$request]);
        }

        $response = new Response();
        $response->setStatusCode(404);
        $response->setContent("Page not found...");
        return $response;
    }

    public static function isHome($requestURI): bool
    {
        return '/' === $requestURI;
    }
}

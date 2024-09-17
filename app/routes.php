<?php
declare(strict_types=1);

use App\Controllers\CoursesAPIController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Http\ServerRequest;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    //demo code - two ways of linking urls to functionality, either via anon function or linking to a controller

    $app->get('/', function ($request, $response, $args) use ($container) {
        $renderer = $container->get(PhpRenderer::class);
        return $renderer->render($response, "index.php", $args);
    });

    $app->get('/courses', CoursesAPIController::class);

    $app->get('/welcome', function (ServerRequest $request, Response $response, $args) use ($container)
    {
        $renderer = $container->get(PhpRenderer::class);
        return $renderer->render($response, "welcome.phtml", $args);
    });

//    the following example renders the content into a file - weather.phtml
    $app->get('/weather/{city}/{condition}', function (ServerRequest $request, Response $response, $args) use ($container)
    {
        $renderer = $container->get(PhpRenderer::class);
        return $renderer->render($response, "weather.phtml", ['city' => $args['city'], 'condition' => $args['condition']]);
    });

//    the following example gives the same result but writes the html response directly within itself
//    instead of rendering via something like weather.phtml
    $app->get('/temperature/{city}/{condition}', function (ServerRequest $request, Response $response, $args)
    {
        $response->getBody()->write("<h2>The temperature in " . $args['city'] . " is " . $args['condition'] . "</h2>");
        return $response;
    });

    $app->get('/pet/{name}[/{species}]', function (ServerRequest $request, Response $response, $args) use ($container)
    {
        $species = $args['species'] ?? 'pet';
        $response->getBody()->write("<h2> I have a " . $species . " called " . $args['name'] . "</h2>");
        return $response;
    });

    $app->get('/myName/{firstName}/{lastName}', function (ServerRequest $request, Response $response, $args) use ($container)
    {
        $renderer = $container->get(PhpRenderer::class);
        return $renderer->render($response, "myName.phtml", ['firstName' => $args['firstName'], 'lastName' => $args['lastName']]);
    });
};

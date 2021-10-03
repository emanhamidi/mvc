<?php

namespace Core;

class View
{
    public static function render(string $view, array $parameters = []): string
    {
        $viewPath = __DIR__.'/../app/Views/'.$view.'.html';
        if (!file_exists($viewPath)) {
            throw new Exception('View not found');
        }
        $output = preg_replace_callback(
            '/\{\{ (.*?) \}\}/',
            function ($parameter) use ($parameters) {
                return $parameters[$parameter[1]] ?? '';
            },
            file_get_contents($viewPath)
        );
        return $output;
    }
}

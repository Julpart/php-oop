<?php

namespace app\engine;

use app\interfaces\IRender;

class TwigRender implements IRender
{
    protected $twig;
    protected $loader;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('../templates');
        $this->twig = new \Twig\Environment($this->loader);
    }
public function renderTemplate($template, $params = []){
    return $this->twig->render($template . '.twig', $params);
}
}
<?php

namespace app\core;

class Controller {
  /**
   * Método repsonsável por renderizar o conteúdo (view) do nosso template
   * @return void
   */
  protected function load(string $view, $params = []){
    $twig = new \Twig\Environment(
      new \Twig\Loader\FilesystemLoader('../app/view/')
    );

    echo $twig->render("{$view}.twig", $params);
  }
}
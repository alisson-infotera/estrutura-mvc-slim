<?php

namespace app\core;

class RouterCore {
  private $uri;
  private $getArr = [];
   
  public function __construct() {
    $this->get('/', 'TemplateController@voucher');
    $this->execute();
  }
   
  private function get($router, $call) {
    $this->getArr[] = [
    'router' => $router,
    'call' => $call
    ];
  }
   
  private function execute() {
    foreach ($this->getArr as $get) {
      $route = substr($get['router'], 1);

      if (substr($route, -1) == '/') {
        $route = substr($route, 0, -1);
      }
      if ($route == $this->uri) {
        if (is_callable($get['call'])) {
           ['call']();
           break;
        } else {
           $this->executeController($get['call']);
        }
      }
    }
  }
   
  private function executeController($get) {
    $ex = explode('@', $get);
    $cont = "app\\controller\\{$ex[0]}";

    call_user_func_array([
    new $cont,
    $ex[1]
    ], []);
  }
}
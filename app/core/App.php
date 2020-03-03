<?php




class App
{
  protected $controller = 'home';
  protected $method = 'index';
  protected $params = [];
  public function __construct()
  {
    //==//  1
    $url = $this->parseURL();

    //=//   2
    if (file_exists("../app/controllers/" . $url[0] . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once "../app/controllers/" . $this->controller . ".php";
    $this->controller = new $this->controller;


    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    if (!empty($url)) {
      $this->params = array_values($url);
    }
    // pr
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  //=// 3
  public function parseURL()
  {

    if (isset($_GET['url'])) {    // jika ada url true
      $url = rtrim($_GET['url'], '/');  // hapus karakter terakhir / dari url /home/index/ jadi /home/index
      $url = filter_var($url, FILTER_SANITIZE_URL);  // PR url = /s$-_.+!*'(),{}|\\^~[]`"><#%;/?:@&=/ result = /s$-_. !*'(),{}|/^~[]`">< kenapa banyak caracther ilegal lolos seharusnya outputnya s doang 
      $url = explode('/', $url);  // string to array dengan pembatasnya /
      return $url;
    }
  }
}

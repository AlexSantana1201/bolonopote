<?php
use App\Classes\Uri;
use App\Core\CoreController;
use App\Core\CoreMethod;
  
  //Pegando a URI; 
  $uri = new Uri();
  //Chamando o controller e passando a URi como parametro. 
  $CoreController = new CoreController($uri->getUri());  
 //Pegando o controller que foi chamado na URI e buscando ele no namespace
  $getController = $CoreController->GetControllerInNameSpace();
  //Instanciando o controller 
  $controller = new $getController;
  //Buscando o method que foi digitado na URI
  $CoreMethod = new CoreMethod($controller, $uri->getUri());
  //Verificando se o method existe no controller
  $method = $CoreMethod->GetMethodInController();

  //Chamando o controller e o method
  $controller->$method();

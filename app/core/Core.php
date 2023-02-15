<?php

class Core
{
    private $controller;
    private $metodo;
    private $parametros = array();

    public function __construct()
    {
        $this->verificaUri();
    }

    public function run()
    {
        $controllerCorrente = $this->getController();

        $c = new $controllerCorrente;
        call_user_func_array(array($c, $this->getMetodo()), $this->getParametros());
    }
    public function verificaUri()
    {
        $url = explode("index.php", $_SERVER["PHP_SELF"]);
        $url = end($url);

        if ($url != "") {
            $url = explode('/', $url);
            array_shift($url);

            //Pega o Controller
            $this->controller = ucfirst($url[0]) . "Controller";
            array_shift($url);

            //Pega o Método
            if (isset($url[0])) {
                $this->metodo = $url[0];
                array_shift($url);
            }

            //Pegar os parâmetros
            if (isset($url[0])) {
                $this->parametros = array_filter($url);
            }
        } else {
            $this->controller = ucfirst(CONTROLLER_PADRAO) . "Controller";
        }
    }
    public function getController()
    {
        if (class_exists(NAMESPACE_CONTROLLER . $this->controller)) {
            return NAMESPACE_CONTROLLER . $this->controller;
        } else {
            echo " 
            <body style='background-color:#324ca8; align-items:center;justify-content: center; display: flex;'>
                <div>
                    <div style='width:32rem;padding:10px;margin:10px;border: 1px solid #cecece; border-radius: 3px; align-items:center; text-align:center; background-color: #fff;'>
                        <div>
                            <h1 style='font-family:arial; font-size:24px; font-weight:700; color:#4045BC'>
                                ⚠ Erro 404!
                            </h1>
                            <br>
                            <h5 style='font-family:arial; font-size:20px; font-weight:lighter; color:#4045BC'>
                                Ops!... Parece que você está tentando acessar uma página que não existe. Verifique se digitou corretamente o endereço desejado a barra de endereço do seu navegador.
                            </h5>
                            <br><br>
                            <small style='font-family:arial; font-size:10px; font-weight:lighter; color:#4045BC'>
                                engcriatema <br>copyright &copy; 2011-2022
                            </small>
                        </div>
                    </div>
                </div>
            </body>
                ";
            exit;
        }
        return NAMESPACE_CONTROLLER . ucfirst(CONTROLLER_PADRAO) . "Controller";
    }

    public function getMetodo()
    {
        if (method_exists(NAMESPACE_CONTROLLER . $this->controller, $this->metodo)) {
            return $this->metodo;
        }
        return METODO_PADRAO;
    }

    public function getParametros()
    {
        return $this->parametros;
    }
}

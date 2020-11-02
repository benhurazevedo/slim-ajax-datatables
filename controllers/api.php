<?php
namespace controllers;
use \Psr\Container\ContainerInterface;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class api
{
   protected $container;

   public function __construct(ContainerInterface $container) 
   {
       $this->container = $container;
   }
   public function __invoke(Request $request, Response $response, $args)  
   {
        $contasDAO = $this->container['dbService\ContasDAO'];
        $iterador = $contasDAO->getAllContas();
        $response->withHeader('Content-type', 'application/json');
        $response->withStatus(200);
        $corpoResposta = $response->getBody();
        $primeiro = true;
        $corpoResposta->write('{"data":[');
            foreach ($iterador as $row)
            {
                if($primeiro)
                {
                    $corpoResposta->write(json_encode($row));
                    $primeiro = false;
                }
                else 
                {
                    $corpoResposta->write("," . json_encode($row));
                }
            }
        $corpoResposta->Write("]}");
        return $response;
   }
}
?>
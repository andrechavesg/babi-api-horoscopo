<?php

/**
 * Created by PhpStorm.
 * User: André Chaves
 * Date: 2019-02-25
 * Time: 21:57
 */
namespace App\Controller;

use App\Service\HoroscopoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HoroscopoController
 * @package App\Controller
 */
class HoroscopoController extends AbstractController
{
    /**
     * @var HoroscopoService
     */
    private $horoscopoService;

    public function __construct(HoroscopoService $horoscopoService)
    {
        $this->horoscopoService = $horoscopoService;
    }

    /**
     * @Route("/signo/{signo}/dia",methods={"GET"})
     * @Route("/signo/{signo}/dia/",methods={"GET"})
     */
    public function getHoroscopoDoDiaPorSigno($signo)
    {
        try {
            $previsaoDoDia = $this->horoscopoService->getPrevisaoDiariaPeloSigno($signo);

            return new JsonResponse($previsaoDoDia);
        } catch (\Throwable $throwable) {
            return new JsonResponse("Erro ao buscar horscopo do dia para o signo {$signo}: {$throwable->getMessage()}", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("{dataDeNascimento}/dia",methods={"GET"})
     * @Route("{dataDeNascimento}/dia/",methods={"GET"})
     */
    public function getHoroscopoDoDia($dataDeNascimento)
    {
        try {
            $dataDeNascimento = new \DateTime($dataDeNascimento);
            $previsaoDoDia = $this->horoscopoService->getPrevisaoDiaria($dataDeNascimento);

            return new JsonResponse($previsaoDoDia);
        } catch (\Throwable $throwable) {
            return new JsonResponse("Erro ao buscar horscopo do dia para a data de nascimento {$dataDeNascimento->format('d-m-Y')}: {$throwable->getMessage()}", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("{dataDeNascimento}/semana",methods={"GET"})
     * @Route("{dataDeNascimento}/semana/",methods={"GET"})
     */
    public function getHoroscopoDaSemana($dataDeNascimento)
    {
        try {
            $dataDeNascimento = new \DateTime($dataDeNascimento);
            $previsaoDaSemana = $this->horoscopoService->getPrevisaoSemanal($dataDeNascimento);

            return new JsonResponse($previsaoDaSemana);
        } catch (\Throwable $throwable) {
            return new JsonResponse("Erro ao buscar horscopo da semana para a data de nascimento {$dataDeNascimento->format('d-m-Y')}: {$throwable->getMessage()}", Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("signo/{signo}/semana",methods={"GET"})
     * @Route("signo/{signo}/semana/",methods={"GET"})
     */
    public function getHoroscopoDaSemanaPorSigno($signo)
    {
        try {
            $previsaoDaSemana = $this->horoscopoService->getPrevisaoSemanalPeloSigno($signo);

            return new JsonResponse($previsaoDaSemana);
        } catch (\Throwable $throwable) {
            return new JsonResponse("Erro ao buscar horscopo da semana para o signo {$signo}: {$throwable->getMessage()}", Response::HTTP_BAD_REQUEST);
        }
    }
}

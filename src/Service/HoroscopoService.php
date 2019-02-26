<?php
/**
 * Created by PhpStorm.
 * User: André Chaves
 * Date: 24/07/18
 * Time: 16:55
 */

namespace App\Service;

use App\Constant\Signos;
use App\Entity\Previsao;
use DateTime;

class HoroscopoService
{
    /**
     * @var array
     */
    private $signosPorData;
    /**
     * @var SignoParser
     */
    private $signoParser;

    /**
     * HoroscopoService constructor.
     * @param SignoParser $signoParser
     */
    public function __construct(SignoParser $signoParser)
    {
        $this->signosPorData = Signos::getPorData();
        $this->signoParser = $signoParser;
    }

    /**
     * @param DateTime $data
     * @return \App\Entity\Previsao
     * @throws \Exception
     */
    public function getPrevisaoDiaria(DateTime $data):Previsao
    {
        $signo = $this->getSigno($data);
        return $this->signoParser->parseSignoDiario($signo);
    }

    /**
     * @param DateTime $data
     * @return int|string
     * @throws \Exception
     */
    public function getSigno(DateTime $data)
    {
        $dataDeNascimento = new DateTime($data->format("2000-m-d"));

        foreach ($this->signosPorData as $signo => $intervalo) {
            $this->signoParser->parseCapricornio($signo, $dataDeNascimento);
            $osAstrosEstaoAlinhados = $intervalo["min"] <= $dataDeNascimento && $dataDeNascimento <= $intervalo["max"];

            if ($osAstrosEstaoAlinhados) {
                return $signo;
            }
        }

        throw new \RuntimeException("Signo não encontrado para a data {$data->format('d/m/Y')}");
    }

    /**
     * @param $signo
     * @return Previsao
     * @throws \Exception
     */
    public function getPrevisaoDiariaPeloSigno($signo):Previsao
    {
        return $this->signoParser->parseSignoDiario($signo);
    }

    /**
     * @param DateTime $data
     * @return Previsao
     * @throws \Exception
     */
    public function getPrevisaoSemanal(DateTime $data):Previsao
    {
        $signo = $this->getSigno($data);
        return $this->signoParser->parseSignoSemanal($signo);
    }

    /**
     * @param $signo
     * @return Previsao
     * @throws \Exception
     */
    public function getPrevisaoSemanalPeloSigno($signo):Previsao
    {
        return $this->signoParser->parseSignoSemanal($signo);
    }
}

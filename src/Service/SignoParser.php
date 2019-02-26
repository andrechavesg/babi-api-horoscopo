<?php
/**
 * Created by PhpStorm.
 * User: gordo
 * Date: 2019-02-26
 * Time: 00:05
 */

namespace App\Service;

use App\Constant\Signos;
use App\Entity\Previsao;
use DateTime;
use Symfony\Component\DomCrawler\Crawler;

class SignoParser
{
    private $signosPorData;

    /**
     * SignoParser constructor.
     */
    public function __construct()
    {
        $this->signosPorData = Signos::getPorData();
    }

    /**
     * @param $signo
     * @return Previsao
     * @throws \Exception
     */
    public function parseSignoSemanal($signo): Previsao
    {
        $url = "https://www.somostodosum.com.br/horoscopo/signo/{$signo}.html";
        $content = file_get_contents($url);

        $crawler = new Crawler($content);

        $texto = $crawler->filter('*.textogeral:not(table)')->eq(0)->text();
        $autor = $crawler->filter('*.textogeral:not(table) + a')->eq(0)->text();

        return new Previsao($signo,$texto,$autor,$url);
    }

    /**
     * @param DateTime $data
     * @return Previsao
     * @throws \Exception
     */
    public function parseSignoDiario($signo): Previsao
    {
        try {
            $url = "https://universa.uol.com.br/horoscopo/{$signo}/horoscopo-do-dia/";

            $content = file_get_contents($url);

            $crawler = new Crawler($content);

            $texto = $crawler->filter('.image-content-pad .text')->eq(0)->text();
            $autor = $crawler->filter('.p-author')->eq(0)->text();

            return new Previsao($signo,$texto,$autor,$url);
        } catch (\Throwable $throwable) {
            $signos = array_keys($this->signosPorData);
            throw new \RuntimeException("não foi possível encontrar o horoscopo do dia para: {$signo}. Opções disponíveis: {$signos}");
        }
    }

    /**
     * @param $signo
     * @param DateTime $dataDeNascimento
     */
    public function parseCapricornio($signo, DateTime $dataDeNascimento): void
    {
        if ($signo == "capricornio" && $dataDeNascimento->format("m") == "01") {
            $dataDeNascimento->modify('+1year');
        }
    }

    /**
     * @param array $signosPorData
     * @return SignoParser
     */
    public function setSignosPorData(array $signosPorData): SignoParser
    {
        $this->signosPorData = $signosPorData;
        return $this;
    }
}

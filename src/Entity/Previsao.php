<?php
/**
 * Created by PhpStorm.
 * User: gordo
 * Date: 2019-02-26
 * Time: 00:13
 */

namespace App\Entity;


use DateTime;
use JsonSerializable;

class Previsao implements JsonSerializable
{
    private $signo;
    private $texto;
    private $autor;
    private $urlOrigem;
    private $dataAcesso;

    public function __construct(string $signo,string $texto,string $autor,string $urlOrigem,?\DateTime $dataAcesso = null)
    {
        $this->signo = $signo;
        $this->texto = $texto;
        $this->autor = $autor;
        $this->urlOrigem = $urlOrigem;
        $this->dataAcesso = $dataAcesso ?? new DateTime();
    }

    /**
     * @return string
     */
    public function getSigno(): string
    {
        return $this->signo;
    }

    /**
     * @param string $signo
     * @return Previsao
     */
    public function setSigno(string $signo): Previsao
    {
        $this->signo = $signo;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     * @return Previsao
     */
    public function setTexto(string $texto): Previsao
    {
        $this->texto = $texto;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutor(): string
    {
        return $this->autor;
    }

    /**
     * @param string $autor
     * @return Previsao
     */
    public function setAutor(string $autor): Previsao
    {
        $this->autor = $autor;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlOrigem(): string
    {
        return $this->urlOrigem;
    }

    /**
     * @param string $urlOrigem
     * @return Previsao
     */
    public function setUrlOrigem(string $urlOrigem): Previsao
    {
        $this->urlOrigem = $urlOrigem;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataAcesso(): ?DateTime
    {
        return $this->dataAcesso;
    }

    /**
     * @param DateTime|null $dataAcesso
     * @return Previsao
     */
    public function setDataAcesso(?DateTime $dataAcesso): Previsao
    {
        $this->dataAcesso = $dataAcesso;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return ["signo" => $this->getSigno(),
            "texto" => $this->getTexto(),
            "autor" => $this->getAutor(),
            "urlOrigem" => $this->getUrlOrigem(),
            "dataAcesso" => $this->getDataAcesso()];
    }
}

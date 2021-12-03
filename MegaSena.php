<?php

class MegaSena
{
    private $quantidade_dezenas;
    private $resultado;
    private $total_jogos;
    private $jogos;

    public function __construct($quantidade_dezenas, $total_jogos){
        $this->quantidade_dezenas = $quantidade_dezenas;
        $this->total_jogos = $total_jogos;
    }

    private function removerDuplicidade(array $array){
        sort($array);
        return array_unique($array, SORT_REGULAR);
    }

    private function obterDezenas(){
        $qtd_dezenas = $this->getQuantidadeDezenas();
        $dezenas = [];

        for($i=0; $i<=$qtd_dezenas; $i++){
            $dezenas[] = random_int($i, $qtd_dezenas);
            $dezenas = removerDuplicidade($dezenas);
        }

        return $dezenas;
    }

    public function obterQuantidadeJogos(){
        $total_jogos = $this->getTotalJogos();

        $jogos = [];
        for($i=0; $i<=$total_jogos; $i++){
            $jogos[] = $this->obterDezenas();
            $jogos = removerDuplicidade($jogos);
        }

        $this->setTotalJogos($jogos);
    }

    public function sorteioDezenas(){
        $sorteio = [];
        for($i=0; $i<=6; $i++){
            $sorteio[] = random_int($i, 6);
            $sorteio = removerDuplicidade($sorteio);
        }

        $this->setResultado($sorteio);
    }

    public function resultadoJogos(){
        $jogos = $this->getTotalJogos();
        $html = ''; 
        foreach($jogos as $jogo){
            foreach($jogo as $chave => $j){
                $html .= "<table>";
                $html .= "<thead>";
                $html .= "<tr>";
                $html .= "<td>Jogo</td>";
                $html .= "<td>Dezena</td>";
                $html .= "</tr>";
                $html .= "</thead>";
                $html .= "<tr>";
                $html .= "<td>$chave</td>";
                $html .= "<td>$j</td>";
                $html .= "</tr>";
            }
        }

        return $html;
    }

    public function setQuantidadeDezenas($value){
        $this->quantidade_dezenas = $value;
    }

    public function getQuantidadeDezenas(){
        return $this->quantidade_dezenas;
    }

    public function setResultado($value){
        $this->resultado = $value;
    }

    public function getResultado(){
        return $this->resultado;
    }

    public function setTotalJogos($value){
        $this->total_jogos = $value;
    }

    public function getTotalJogos(){
        return $this->total_jogos;
    }

    public function setJogos($value){
        $this->jogos = $value;
    }

    public function getJogos(){
        return $this->jogos;
    }


}

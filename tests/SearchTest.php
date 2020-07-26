<?php

use PHPUnit\Framework\TestCase;
use Wead\DigitalCep\Search;

class SearchTest extends TestCase {

  /**
   * @dataProvider dadosTeste
   */
  public function testGetAddressFromZipcodeDefaultUsage(string $input, array $esperado) {
    $resultado = new Search;
    $resultado = $resultado->getAddressFromZipcode($input);
    
    $this->assertEquals($esperado, $resultado);
  }

  public function dadosTeste() {
    return [
      "Endereco Praça da Sé" => [
        "01001000",
        [
          "cep" => "01001-000",
          "logradouro" => "Praça da Sé",
          "complemento" => "lado ímpar",
          "bairro" => "Sé",
          "localidade" => "São Paulo",
          "uf" => "SP",
          "unidade" => "",
          "ibge" => "3550308",
          "gia" => "1004"
        ]
      ],
      "Endereco Qualquer" => [
        "03624-010",
        [
          "cep" => "03624-010",
          "logradouro" => "Rua Luís Asson",
          "complemento" => "",
          "bairro" => "Vila Buenos Aires",
          "localidade" => "São Paulo",
          "uf" => "SP",
          "unidade" => "",
          "ibge" => "3550308",
          "gia" => "1004"
        ]
      ]
    ];
  }
}
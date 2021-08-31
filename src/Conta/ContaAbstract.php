<?php

namespace Moovin\Job\Backend\Conta;

abstract class ContaAbstract
{
    /**
     * tipo_conta
     *
     * Informa se o tipo de conta é
     * cc = Conta Corrente
     * poupanca = Conta Poupança
     *
     * @var string
     */
    protected $tipo_conta;

    /**
     * limite
     *
     * Informa qual é o valor de limite para o saque
     *
     * @var integer
     */
    protected $limite;

    /**
     * taxa_operacao
     *
     * Informa qual é o valor da taxa de operação
     * para a realização de saque
     *
     * @var float
     */
    protected $taxa_operacao;

    /**
     * numero_conta
     *
     * Informa o numero da conta do cliente
     *
     * @var [integer]
     */
    protected $numero_conta;

    /**
     * saldo
     *
     * Armazena o saldo da conta do cliente
     *
     * @var float
     */
    protected $saldo = 0;

    /**
     * __construct
     *
     * Metodo contrutor para informar o numero da conta
     *
     * @param [integer] $numero_conta
     */
    public function __construct($numero_conta)
    {
        $this->numero_conta = $numero_conta;
    }

    /**
     * __GET
     *
     * Metodo mágico para ler dados de propriedades inacessíveis.
     *
     * @param [type] $attribute
     * @return void
     */
    public function __GET($attribute)
    {
        return $this->$attribute;
    }

    /**
     * __SET
     *
     * Metodo Mágina para escrever dados em propriedades inacessíveis.
     *
     * @param [type] $attribute
     * @param [type] $value
     * @return void
     */
    public function __SET($attribute, $value)
    {
        $this->$attribute = $value;
    }

    /**
     * exibirDadosConta
     *
     * Metodo exibe as informações da conta
     *
     * Numero da Conta:
     * Tipo de Conta:
     * Saldo:
     *
     * @return void
     */
    public function exibirDadosConta()
    {
        return "\nConta: $this->numero_conta\nTipo de conta: $this->tipo_conta\nSaldo: $this->saldo\n\n";
    }
}

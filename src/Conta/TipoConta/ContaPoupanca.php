<?php

namespace Moovin\Job\Backend\Conta\TipoConta;

use Moovin\Job\Backend\Conta\ContaAbstract;

class ContaPoupanca extends ContaAbstract
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
    protected $tipo_conta = 'poupanca';

    /**
     * limite
     *
     * Informa qual é o valor de limite para o saque
     *
     * @var integer
     */
    protected $limite = 1000;

    /**
     * taxa_operacao
     *
     * Informa qual é o valor da taxa de operação
     * para a realização de saque
     *
     * @var float
     */
    protected $taxa_operacao = 0.80;
}

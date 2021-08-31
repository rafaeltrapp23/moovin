<?php

namespace Moovin\Job\Backend\Conta\TipoConta;

use Moovin\Job\Backend\Conta\ContaAbstract;

class ContaCorrente extends ContaAbstract
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
    protected $tipo_conta = 'cc';

    /**
     * limite
     *
     * Informa qual é o valor de limite para o saque
     *
     * @var integer
     */
    protected $limite = 600;

    /**
     * taxa_operacao
     *
     * Informa qual é o valor da taxa de operação
     * para a realização de saque
     *
     * @var float
     */
    protected $taxa_operacao = 2.50;
}

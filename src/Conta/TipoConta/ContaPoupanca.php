<?php

namespace Moovin\Job\Backend\Conta\TipoConta;

use Moovin\Job\Backend\Conta\ContaAbstract;

class ContaPoupanca extends ContaAbstract
{
    protected $tipo_conta = 'poupanca';

    protected $limite = 1000;

    protected $taxa_operacao = 0.80;
}

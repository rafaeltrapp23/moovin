<?php

namespace Moovin\Job\Backend\Conta\TipoConta;

use Moovin\Job\Backend\Conta\ContaAbstract;

class ContaCorrente extends ContaAbstract
{
    protected $tipo_conta = 'cc';

    protected $limite = 600;

    protected $taxa_operacao = 2.50;
}

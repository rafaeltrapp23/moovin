<?php

namespace Moovin\Job\Backend\Conta;

abstract class ContaAbstract
{
    protected $tipo_conta;

    protected $limite;

    protected $taxa_operacao;

    protected $numero_conta;

    protected $saldo = 0;

    public function __construct($numero_conta)
    {
        $this->numero_conta = $numero_conta;
    }

    public function __GET($attribute)
    {
        return $this->$attribute;
    }

    public function __SET($attribute, $value)
    {
        $this->$attribute = $value;
    }

    public function exibirDadosConta()
    {
        return "\nConta: $this->numero_conta\nTipo de conta: $this->tipo_conta\nSaldo: $this->saldo\n\n";
    }
}

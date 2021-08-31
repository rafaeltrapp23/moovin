<?php

namespace Moovin\Job\Backend\Caixa;

class Caixa
{
    protected $tipo_conta;

    public function __construct($tipo_conta)
    {
        $this->tipo_conta = $tipo_conta;
    }

    public function deposito($valor)
    {
        try {
            //valida se o valor é um valor valido e positivo
            if (!is_numeric($valor) || $valor < 0) {
                throw new \Exception('Valor esta incorreto');
            }

            //aplica o valor de deposito
            $this->tipo_conta->saldo = $this->tipo_conta->saldo + $valor;

            echo "\nDeposito realizado com sucesso!\n";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function saque($valor)
    {
        try {
            //valida se o valor é um valor valido e positivo
            if (!is_numeric($valor) || $valor < 0) {
                throw new \Exception('Valor esta incorreto');
            }

            //valida o limite de saque
            if ($valor > $this->tipo_conta->limite) {
                throw new \Exception('Limite de saque por transação é de B$ ' . $this->tipo_conta->limite . "\n");
            }

            //calcula o valor disponivel para saque, subtraindo o valor da taxa de operação
            $valorDisponivel = $this->tipo_conta->saldo - $this->tipo_conta->taxa_operacao;

            //calcula o valor do saque
            $valorSaque = $valor + $this->tipo_conta->taxa_operacao;

            //verifica se tem saldo na conta
            if ($valorSaque > $this->tipo_conta->saldo) {
                throw new \Exception('Você não tem saldo suficiente para realizar essa saque, o valor disponivel é de B$ ' . $valorDisponivel . "\n");
            }

            //aplica o saque
            $this->tipo_conta->saldo = $this->tipo_conta->saldo - $valorSaque;

            echo "\nSaque realizado com sucesso!\n";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function transferencia($valor, $conta_destino)
    {
        try {
            //valida se o valor é um valor valido e positivo
            if (!is_numeric($valor) || $valor < 0) {
                throw new \Exception('Valor esta incorreto');
            }

            if ($valor > $this->tipo_conta->saldo) {
                throw new \Exception('Você não tem saldo suficiente para realizar a tranferencia, o valor disponivel é de B$ ' . $this->tipo_conta->saldo . "\n");
            }

            $this->tipo_conta->saldo = $this->tipo_conta->saldo - $valor;
            $conta_destino->saldo = $conta_destino->saldo + $valor;

            echo "\nTransferência realizada com sucesso!\n";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function exibirSaldo()
    {
        echo $this->tipo_conta->exibirDadosConta();
    }
}

<?php

namespace Moovin\Job\Backend\Caixa;

class Caixa
{
    protected $tipo_conta;

    /**
     * __contruct
     *
     * inicia a instancia da classe informando qual o
     * tipo de conta que será usada
     *
     * @param [object] $tipo_conta
     */
    public function __construct($tipo_conta)
    {
        $this->tipo_conta = $tipo_conta;
    }

    /**
     * deposito
     * Realiza o deposito na conta iniciada
     * e valida se o valor informado esta correto
     *
     * @param [float] $valor
     * @return void
     */
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

    /**
     * saque
     * metodo faz a retirada de valor do saldo da conta
     * validado o valor informado esta correto
     * verificando se não ultrapassa o limite
     * e se a conta tem o valor solicitado
     *
     * @param [float] $valor
     * @return void
     */
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

    /**
     * transferencia
     * Metodo realiza a transferencia de biteris da conta inicial
     * para a conta de destino
     * validado o valor informado esta correto
     * validando se a conta possui saldo
     *
     * @param [float] $valor
     * @param [object] $conta_destino
     * @return void
     */
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

    /**
     * exibirSaldo
     * Metodo exibe as informações da conta
     *
     * Numero da Conta:
     * Tipo de Conta:
     * Saldo:
     *
     * @return void
     */
    public function exibirSaldo()
    {
        echo $this->tipo_conta->exibirDadosConta();
    }
}

<?php



require_once __DIR__ . '/vendor/autoload.php';

use Moovin\Job\Backend\Caixa\Caixa;
use Moovin\Job\Backend\Conta\TipoConta\ContaCorrente;
use Moovin\Job\Backend\Conta\TipoConta\ContaPoupanca;

//inicia a conta
$contaPoupanca = new ContaPoupanca(1234);

//inicia a transação no caixa eletronico
$caixa = new Caixa($contaPoupanca);

//exibe o saldo da conta
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

//realiza o deposito
echo "\n\nCONTA 1234: DEPOSITO DE B$ 2000\n";
$caixa->deposito(2000);

//exibe o saldo da conta
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

//realiza o saque
echo "\n\nCONTA 1234: SAQUE DE B$ 1200\n";
$caixa->saque(1200);

//exibe o saldo da conta
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

//inicia a realização da transferencia
//informa a conta destino que será do tipo cc
$contaCorrente = new ContaCorrente(392006);

//realiza a transferencia de B$ 100
echo "\n\nCONTA 1234: TRANSFERENCIA DE B$ 100 PARA CONTA CC 392006\n";
$caixa->transferencia(100, $contaCorrente);

//exibe o saldo da conta Poupança
//mostra o saldo com o valor de transferencia descontado
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

//inicia a consulta na conta CC
$caixa2 = new Caixa($contaCorrente);

//exibe o saldo da conta CC
echo "\n\nCONTA 392006: EXIBE SALDO\n";
$caixa2->exibirSaldo();

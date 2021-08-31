<?php



require_once __DIR__ . '/vendor/autoload.php';

use Moovin\Job\Backend\Caixa\Caixa;
use Moovin\Job\Backend\Conta\TipoConta\ContaCorrente;
use Moovin\Job\Backend\Conta\TipoConta\ContaPoupanca;

$numero_conta = 1234;
$contaPoupanca = new ContaPoupanca($numero_conta);
$caixa = new Caixa($contaPoupanca);
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();
echo "\n\nCONTA 1234: DEPOSITO DE B$ 2000\n";
$caixa->deposito(2000);
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();
echo "\n\nCONTA 1234: SAQUE DE B$ 1200\n";
$caixa->saque(1200);
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

$contaCorrente = new ContaCorrente(392006);
echo "\n\nCONTA 1234: TRANSFERENCIA DE B$ 100 PARA CONTA CC 392006\n";
$caixa->transferencia(100, $contaCorrente);
echo "\n\nCONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

$caixa2 = new Caixa($contaCorrente);
echo "\n\nCONTA 392006: EXIBE SALDO\n";
$caixa2->exibirSaldo();



/* $numero_conta = 987654;
$contaCorrente = new ContaCorrente($numero_conta);
$caixa = new Caixa($contaCorrente);
echo "CONTA 1234: DEPOSITO DE B$ 2000\n";
$caixa->deposito(2000);
echo "CONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();
echo "CONTA 1234: SAQUE DE B$ 1200\n";
$caixa->saque(600);
echo "CONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

$contaCorrente = new ContaCorrente(392006);
echo "CONTA 1234: TRANSFERENCIA DE B$ 100\n";
$caixa->transferencia(100, $contaCorrente);
echo "CONTA 1234: EXIBE SALDO\n";
$caixa->exibirSaldo();

$caixa2 = new Caixa($contaCorrente);
echo "CONTA 392006: EXIBE SALDO\n";
$caixa2->exibirSaldo(); */
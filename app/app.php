<?php
declare(strict_types=1);

function getTransactionFiles(string $dirpath):array{
    $files=[];
    foreach(scandir($dirpath) as $file){
        if(is_dir($file)){
            continue;
        }
        $files[]=$dirpath.$file;
    }
    return $files;
}

function getTransactions( string $fileName):array{
    if (! file_exists($fileName)){
        trigger_error("file".$fileName."not exist".E_USER_ERROR);
    }
    $file=fopen($fileName,'r');
    fgetcsv($file);
    $transactions=[];
    while(($transaction=fgetcsv($file))!==false){
        $transactions[]=extractTransaction($transaction);
    }
    return $transactions;
}

function extractTransaction ($transactionRow): array {
    [$date,$check,$description,$amount]=$transactionRow;
$amount = (float) str_replace(['$',','],"",$amount);
    return [
        'date'=> $date,
        'check'=> $check,
        'description'=> $description,
        'amount'=> $amount
    ];
}

function calculateTotals(array $transactions):array{
    $totals=['netTotal'=>0 , 'totalIncome'=>0,'totalExpense'=>0];
    foreach($transactions as $transaction){
        $totals['netTotal']+=$transaction['amount'];
        if ($transaction['amount']>=0){
            $totals['totalIncome']+=$transaction['amount'];
        }else{
            $totals['totalExpense']+=$transaction['amount'];

        }
    }
    return $totals;
}





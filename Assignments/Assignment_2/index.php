<?php

require_once 'CLIApp.php';
require_once 'MyExpenceManager.php';
require_once 'TransactionType.php';
require_once 'Storage.php';
require_once 'FileStorage.php';
require_once 'category.php';
require_once 'IncomeCategory.php';
require_once 'Transaction.php';
require_once 'Income.php';

$CLIApp = new CLIApp();
$CLIApp->run();

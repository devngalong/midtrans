<?php
$evironment = false;

$api_url = $evironment ?
    'https://app.midtrans.com/snap/v1/transactions' :
    'https://app.sandbox.midtrans.com/snap/v1/transactions';
$server_key =  $evironment ?
    'SB-Mid-client-2BAki8NDjYvS_ahm' : 'SB-Mid-server-l8Lm9Wn3-r9WIoppnJpyA-G0';

<?php

require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../settings.php';

/**
 * Creates an auth object for a CredentialToken required in the SDK constructor for calling all endpoints. Passing through the CredentialToken constructor: the credential public key, handler public key and handler private key, so the auth token can be generated.
 */
$auth = new \idOS\Auth\CredentialToken(
	$credentials['credentialPublicKey'],
	$credentials['handlerPublicKey'],
	$credentials['handlerPrivKey']
);

/**
 * Calls the create method that instantiates the SDK passing the auth object trought the constructor
 */
$sdk = \idOS\SDK::create($auth);

/**
 * Lists all warnings for the given username
 */
$response = $sdk
    ->Profile($credentials['username'])
    ->Warnings->listAll();

/**
 * Prints the api response
 */
print_r($response);

/**
 * Retrieves a process given its slug
 */
$response = $sdk
	->Profile($credentials['username'])
	->Warnings->getOne($response['data'][0]['slug']);

/**
 * Prints the api response
 */
print_r($response);


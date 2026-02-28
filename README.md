# SOAP Calculator Client (PHP)

PHP web client that consumes a SOAP web service to perform basic arithmetic operations.

## Features
- Sends SOAP requests using cURL
- Handles dynamic operation selection
- Displays raw SOAP response
- Simple styled interface

## Tech Stack
- PHP
- cURL
- SOAP (XML)
- HTML/CSS

## How It Works
The client builds a SOAP XML envelope dynamically based on user input
and sends it to a SOAP web service endpoint.

## Configuration
Update the SOAP service URL inside:

$location = "YOUR_SOAP_SERVICE_URL_HERE";

## Requirements
- PHP 7+
- cURL enabled
- Running SOAP service endpoint


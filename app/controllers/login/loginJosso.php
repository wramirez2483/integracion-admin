<?php

// function loginJosso($document, $typeDocument, $password){
//     // General el token
//     // $assertionId = genAssertId($document, $typeDocument, $password);
//     // Genera la session pasandole el token 
//     // $sessionId = genSession($assertionId);
//     // echo($assertionId);
//     // echo $sessionId;
   
//     return genAssertId($document, $typeDocument, $password);
// }
 
// General token
function genAssertId($document, $typeDocument, $password)
{
    ini_set("display_errors", 0);
    // End point
    $wsdl = "http://authpre.senasofiaplus.edu.co/josso/services/SSOIdentityProvider?wsdl";
    // Formato de username
    $username = strtoupper($typeDocument) . "," . $document . ",";

    // Configurar la solicitud SOAP

    $msg = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ass="http://josso.org/gateway/ws/1.1/wsdl/soapbinding/IdentityProvider/assertIdentityWithSimpleAuthentication">
        <soapenv:Header/>
        <soapenv:Body>
            <ass:assertIdentityWithSimpleAuthentication soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
                <AssertIdentityWithSimpleAuthenticationRequest xsi:type="prot:AssertIdentityWithSimpleAuthenticationRequestType" xmlns:prot="http://josso.org/gateway/ws/1.1/protocol">
                    <securityDomain xsi:type="xsd:string">josso</securityDomain>
                            <username xsi:type="xsd:string">'. $username .'</username>
                            <password xsi:type="xsd:string">'. $password .'</password>
                </AssertIdentityWithSimpleAuthenticationRequest>
            </ass:assertIdentityWithSimpleAuthentication>
        </soapenv:Body>
        </soapenv:Envelope>';

    // Realizar la solicitud SOAP
    $response = sendRequestSoap($wsdl, $msg);

    // Extraer el valor del elemento 'assertionId'
    $xml = simplexml_load_string($response);
    $assertionId = (string)$xml->xpath('//assertionId')[0];
    
    return $assertionId;
}

// General session Id
function genSession($josso_assertion_id)
{
    ini_set("display_errors", 0);
    $wsdl = "http://authpre.senasofiaplus.edu.co/josso/services/SSOIdentityProvider?wsdl";
    // Configurar la solicitud SOAP
    $msg = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
    xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
    xmlns:res="http://josso.org/gateway/ws/1.1/wsdl/soapbinding/IdentityProvider/resolveAuthenticationAssertion">
    <soapenv:Header/>
    <soapenv:Body>
        <res:resolveAuthenticationAssertion soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
            <ResolveAuthenticationAssertionRequest xsi:type="prot:ResolveAuthenticationAssertionRequestType" xmlns:prot="http://josso.org/gateway/ws/1.1/protocol">
                <assertionId xsi:type="xsd:string">'. $josso_assertion_id .'</assertionId>   
            </ResolveAuthenticationAssertionRequest>
        </res:resolveAuthenticationAssertion>
    </soapenv:Body>
    </soapenv:Envelope>';

    // Realizar la solicitud SOAP
    $response = sendRequestSoap($wsdl, $msg);

    // Extraer el valor del elemento 'ssoSessionId'
    $xml = simplexml_load_string($response);
    $sessionId = (string)$xml->xpath('//ssoSessionId')[0];
    echo $response;
    return $sessionId;
}
 
// Cerrar Sesion
function logout($sessionId){
    ini_set("display_errors", 0);
    
    $wsdl = "http://authpre.senasofiaplus.edu.co/josso/services/SSOIdentityProvider?wsdl";

    // Configurar la solicitud SOAP

    $msg = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:glob="http://josso.org/gateway/ws/1.1/wsdl/soapbinding/IdentityProvider/globalSignoff">
        <soapenv:Header/>
        <soapenv:Body>
        <glob:globalSignoff soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
            <GlobalSignoffRequest xsi:type="prot:GlobalSignoffRequestType" xmlns:prot="http://josso.org/gateway/ws/1.1/protocol">
                <ssoSessionId xsi:type="xsd:string">'.$sessionId.'</ssoSessionId>
            </GlobalSignoffRequest>
        </glob:globalSignoff>
        </soapenv:Body>
    </soapenv:Envelope>';
   
    // Realizar la solicitud SOAP
    sendRequestSoap($wsdl, $msg);
    unset($_SESSION['sessionId']);

}

// Enviar solicitud soap
function sendRequestSoap($wsdl, $msg , $timeout = 50)
{
    ini_set("display_errors", 0);
    // Configurar opciones del cliente SOAP
    $options = array(
        'trace' => 1,
        'exceptions' => true,
        'soap_version' => SOAP_1_1,
        'connection_timeout' => $timeout
    );
    try {
        // Crear cliente SOAP
        $client = new SoapClient($wsdl, $options);

        // Realizar la solicitud SOAP
        $response = $client->__doRequest($msg, $wsdl, '', SOAP_1_1);

        return $response;
    } catch (SoapFault $e) {
        echo 'Error en la solicitud SOAP: ' . $e->getMessage();
        exit;
    } catch (Exception $e) {
        // Capturar otros errores
        echo 'Error: ' . $e->getMessage();
        exit;
    }
}
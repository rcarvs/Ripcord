<?php
/*
That function will load all xmlrpc functions from phpxmlrpc library
 */
require_once 'vendor/autoload.php';

//rewrite xml_rpc php functions to use phpxmlrpc library
function xmlrpc_encode_request($method, $params, $output_options = array())
{
    $msg = new \PhpXmlRpc\Request($method, $params);
    return $msg->serialize();
}

function xmlrpc_decode($xml, $output_options = array())
{
    $msg = new \PhpXmlRpc\Response($xml);
    return $msg->value();
}

function xmlrpc_encode($value, $output_options = array())
{
    $msg = new \PhpXmlRpc\Response($value);
    return $msg->serialize();
}

function xmlrpc_decode_request($xml, &$method, $output_options = array())
{
    $msg = new \PhpXmlRpc\Request($xml);
    $method = $msg->method();
    return $msg->params();
}

function xmlrpc_server_create()
{
    return new \PhpXmlRpc\Server();
}

function xmlrpc_server_register_method($server, $method_name, $function)
{
    $server->addMethod($method_name, $function);
}

function xmlrpc_server_call_method($server, $xml, $user_data = null, $output_options = array())
{
    $msg = new \PhpXmlRpc\Request($xml);
    return $server->call($msg);
}

function xmlrpc_server_destroy($server)
{
    //nothing to do
}

function xmlrpc_parse_method_descriptions($xml)
{
    $msg = new \PhpXmlRpc\Response($xml);
    return $msg->value();
}

function xmlrpc_server_register_introspection_callback($server, $function)
{
    $server->setIntrospectionCallback($function);
}

//end of xmlrpc functions

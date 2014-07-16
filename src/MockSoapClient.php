<?php
class MockSoapClient extends \SoapClient
{
    protected $dummyResponse;

    public function __construct($fakeUrl, array $fakeParams = array()) {}
    
    public function __soapCall ($function_name, $arguments, $options = NULL, $input_headers = NULL, &$output_headers = NULL)
    {
        $tempDummyResponse = $this->dummyResponse;
        $this->setResponse(null);
        
        return $tempDummyResponse;
    }
    
    public function setResponse($dummyResponse)
    {
        $this->dummyResponse = $dummyResponse;
    }
}

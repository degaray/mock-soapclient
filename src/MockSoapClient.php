<?php
class MockSoapClient extends \SoapClient
{
    protected $dummyResponse;

    public function __construct($fakeUrl, array $fakeParams) {}
    
    public function __soapCall ($function_name, array $arguments, array $options = null, $input_headers = null, array &$output_headers = null)
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

<?php
class MockSoapClient extends \SoapClient
{
    protected $dummyResponses;

    protected $lastRequest;

    public function __call($name, $arguments)
    {
        if (isset($this->dummyResponses[$name])) {
            return $this->dummyResponses[$name];
        }

        return null;
    }
    public function __construct($fakeUrl, array $fakeParams = array())
    {
        $this->fakeUrl = $fakeUrl;
        $this->fakeParams = $fakeParams;
    }
    
    public function __soapCall ($function_name, $arguments, $options = NULL, $input_headers = NULL, &$output_headers = NULL)
    {
        return $this->dummyResponses[$function_name];
    }


    public function setDummyResponses(array $dummyResponses)
    {
        $this->dummyResponses = $dummyResponses;
    }

    public function setLastRequest($lastRequest)
    {
        $this->lastRequest = $lastRequest;
    }

    public function __getLastRequest()
    {
        if (isset($this->lastRequest)) {
            return $this->lastRequest;
        }

        return null;
    }
}

<?php


namespace Pitwch\RestAPIWrapperProffix\HttpClient;

class Options
{

    const VERSION = 'v2';

    const TIMEOUT = 15;

    const PX_API_PREFIX = '/pxapi/';

    const USER_AGENT = 'REST API Wrapper PHP';

    const LOGIN_ENDPOINT = 'PRO/Login';

    const NO_LOGIN = array('PRO/Info', 'PRO/Datenbank');

    private $options;


    public function __construct($options)
    {
        $this->options = $options;
    }


    public function getVersion()
    {
        return isset($this->options['version']) ? $this->options['version'] : self::VERSION;
    }

    public function verifySsl()
    {
        return isset($this->options['verify_ssl']) ? (bool)$this->options['verify_ssl'] : true;
    }

    public function getTimeout()
    {
        return isset($this->options['timeout']) ? (int)$this->options['timeout'] : self::TIMEOUT;
    }

    public function apiPrefix()
    {
        return isset($this->options['px_api_prefix']) ? $this->options['px_api_prefix'] : self::PX_API_PREFIX;
    }

    public function getLoginEndpoint()
    {
        return isset($this->options['px_login_endpoint']) ? $this->options['px_login_endpoint'] : self::LOGIN_ENDPOINT;

    }

    public function noLogin()
    {

        return isset($this->options['px_no_login']) ? $this->options['px_no_login'] : true;

    }

    public function doLogin()
    {
        return !in_array($this->noLogin(),self::NO_LOGIN);
    }

    public function getApiKey()
    {
        return isset($this->options['key']) ? $this->options['key'] : '';

    }

    public function userAgent()
    {
        return isset($this->options['user_agent']) ? $this->options['user_agent'] : self::USER_AGENT;
    }

    public function getFollowRedirects()
    {
        return isset($this->options['follow_redirects']) ? (bool)$this->options['follow_redirects'] : false;
    }
}
<?php


/**
 * @author Omid Reza
 */
class Config
{
	private $client=Null;
	private $host='localhost';
	private $port=6379; # defualt port for redis is 6379
	
	public function __construct()
	{
		require '.\predis\autoload.php';
		Predis\Autoloader::register();
	}
	public function connect()
	{
		if(is_string($this->host) and is_int($this->port)) {
			try{
				$this->client = new Predis\Client([
				    'scheme' => 'tcp',
				    'host'   => $this->host,
				    'port'   => $this->port,
				]);
				return $this->client;
			}catch (Exception $e){
				return 'server is unavailble';
			}
		}
		return 'host or port not set';
	}


    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }
}

<?php
class info{
    private $url = 'https://api.covid19api.com/summary';
    private $data;
    
    public function getAllCountries(){
        $this->data = file_get_contents($this->url); 
        return $this->data= json_decode($this->data);
    }

    public function getCountryByCode($code){
         $this->url = "https://disease.sh/v2/countries/$code?yesterday=false";
         $this->data= json_decode($this->data,true);
         return $this->result=$this->data['countryitems'];
    }
}

?>
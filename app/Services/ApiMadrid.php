<?php namespace App\Services;

use Httpful\Request;

class ApiMadrid{
    /*
     * teatros => http://datos.madrid.es/egob/catalogo/208862-7650046-ocio_salas.xml
     * cines => http://datos.madrid.es/egob/catalogo/208862-7650164-ocio_salas.xml
     * auditoriis => http://datos.madrid.es/egob/catalogo/208862-7650180-ocio_salas.xml
     * museos => http://datos.madrid.es/egob/catalogo/201132-0-turismo.xml
     * monumentos => http://datos.madrid.es/egob/catalogo/208844-0-monumentos-edificios.xml
     * fundadiones => http://datos.madrid.es/portal/site/egob/menuitem.c05c1f754a33a9fbe4b2e4b284f1a5a0/?vgnextoid=f7e2e0545fc88410VgnVCM1000000b205a0aRCRD&vgnextchannel=374512b9ace9f310VgnVCM100000171f5a0aRCRD
     *
     */

    public function __construct(){


    }

    public function getCentrosCulturales()
    {
        $uri = 'http://datos.madrid.es/egob/catalogo/200304-0-centros-culturales.xml';
        $xml = $this->consultaApi($uri);
        return $this->parsearEntidades($xml);
    }

    public function getBibliotecas()
    {
        $uri = 'http://datos.madrid.es/egob/catalogo/201747-0-bibliobuses-bibliotecas.xml';
        $xml = $this->consultaApi($uri);
        return $this->parsearEntidades($xml);
    }

    public function getEventosBibliotecas()
    {
        $uri = 'http://datos.madrid.es/egob/catalogo/206717-0-agenda-eventos-bibliotecas.xml';
        $xml = $this->consultaApi($uri);
        return $this->parsearEntidades($xml);
    }

    public function getEventosCulturales()
    {
        $uri = 'http://datos.madrid.es/egob/catalogo/206974-0-agenda-eventos-culturales-100.xml';
        $xml = $this->consultaApi($uri);
        return $this->parsearEntidades($xml);
    }

    private function consultaApi($uri){

        $response = Request::get($uri)  // Will parse based on Content-Type
            ->expectsXml()              // from the response, but can specify
            ->send();                   // how to parse via expectsXml too.

        if($response->code != 200)
        {
            if($response->code == 302)
            {
                $response = Request::get($response->meta_data['redirect_url'])  // Will parse based on Content-Type
                    ->expectsXml()              // from the response, but can specify
                    ->send();
            }
        }

        $xml = $response->body;
        return $xml;
    }

    private function parsearEntidades($xml){
        $objSalida = array();
        foreach ($xml->children() as $contenido) {

            if($contenido->getName()!= 'infoDataset')
            {
                $objContenido = array();
                $objContenido['idTipo'] = (string)$contenido->tipo;
                foreach ($contenido->atributos as $attr) {
                    $objContenido['idioma'] = (string)$attr['idioma'];
                    foreach ($attr as $dato) {
                        if((string)$dato['nombre'] == 'LOCALIZACION' || (string)$dato['nombre'] == 'DATOSCONTACTOS'){
                            $objLocalizacion = array();
                            foreach ($dato as $objLocal) {
                                    $objLocalizacion[strtolower($objLocal['nombre'])] = (string)$objLocal;
                            }
                            $objContenido[strtolower($dato['nombre'])] = $objLocalizacion;
                        }else{
                            $objContenido[strtolower($dato['nombre'])] = (string)$dato;
                        }
                    }
                }
                $objSalida[] = $objContenido;
            }
        }
        return $objSalida;
    }
}
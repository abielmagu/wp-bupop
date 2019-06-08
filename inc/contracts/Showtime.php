<?php namespace Inc\Contracts;

use Inc\Publicity;

class Showtime
{
    private $settings;

    public function __construct( $settings )
    {
        $this->settings = $settings;
    }
    
    public function render()
    {
        if( $this->settings->modo === 'manual' )
            return $this->manual();
        
        return $this->random();
    }

    private function manual()
    {
        $model_publicity = new Publicity;
        if(! $publicity = $model_publicity->find( $this->settings->publicidad_id ) )
            return;
        
        return $this->getElement( $publicity );
    }

    private function random()
    {
        $model_publicity = new Publicity;
        $publicities = $model_publicity->all();

        $numberMax = (count($publicities) - 1);
        $numberRand = rand(0, $numberMax);
        $publicity = $publicities[ $numberRand ];

        return $this->getElement( $publicity );
    }

    private function getElement( $publicity )
    {
        if( $publicity->tipo === 'imagen' )
            return $this->getElementImage( $publicity );
        
        return $this->getElementScript( $publicity );
    }

    private function getElementImage( $publicity )
    {
        $url = get_stylesheet_directory_uri() . '/' . basename( $this->settings->ruta_imagenes ) . '/';
        $url_image = $url . $publicity->contenido;
        return "<div style='display:none' id='popub-content'><img src='{$url_image}'></div>
        <a data-fancybox data-src='#popub-content' href='javascript:;' id='popub-link'></a> \n";

    }

    private function getElementScript( $publicity )
    {
        return stripslashes( html_entity_decode($publicity->contenido) );
    }
}
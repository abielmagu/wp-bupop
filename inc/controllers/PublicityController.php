<?php namespace Inc\Controllers;

use Inc\Core\Controller;
use Inc\Publicity;
use Inc\Factories\PublicityContractFactory;

class PublicityController extends Controller
{
    public static function add()
    {
        $types = popub_config('types');
        return popub_render('publicity/add', compact('types'));
    }

    public static function store()
    {
        $request = self::request();
        $contract = PublicityContractFactory::make( $request['tipo'] );

        $data = [
            'titulo'    => sanitize_text_field( $request['titulo'] ),
            'tipo'      => sanitize_text_field( $request['tipo'] ),
            'contenido' => $contract->generate( $request ),
            'enlace'    => isset( $request['enlace'] ) ? $request['enlace'] : null,
            'creado_at' => DATETIME_NOW,
        ];
        
        $model = new Publicity;
        if( $model->store($data) )
            return self::redirect( 'admin.php', ['page' => 'popub-home', 'notice' => 'saved'] );

        return self::redirect( 'admin.php', ['page' => 'popub-add', 'notice' => 'error'] );
    }

    public static function delete()
    {
        $model = new Publicity;
        $publicity = $model->find( self::request('publicidad') );

        $contract = PublicityContractFactory::make( $publicity->tipo );
        $contract->delete( $publicity );

        $notice = $model->delete( ['id' => $publicity->id] ) ? 'deleted' : 'error';
        return self::redirect( 'admin.php', ['page' => 'popub-home', 'notice' => $notice] );
    }
}
<?php namespace Inc\Controllers;

use Inc\Settings;
use Inc\Core\Notice;

class SettingsController extends \Inc\Core\Controller
{
    public static function index()
    {
        $settings = Settings::values();
        $modes = popub_config('modes');
        return popub_render('settings/index', compact('settings', 'modes'));
    }
    
    public static function update()
    {
        $request = self::request();
        $data = [
            'modo' => $request['modo'],
            'actualizado_at' => DATETIME_NOW,
        ];

        $model = new Settings;
        $notice = $model->update($data, ['id' => 1]) 
                ? 'updated'
                : 'error';

        return self::redirect( 'admin.php', ['page' => 'popub-settings', 'notice' => $notice] );
    }

    public static function updateManual()
    {
        $request = self::request();
        $model = new Settings;

        if( $model->update(['publicidad_id' => $request['publicidad']], ['id' => 1]) )
        {
            echo json_encode([
                'status' => true,
                'element' => Notice::get('updated'),
            ]);
            return;
        }
        
        echo json_encode([
            'status' => false,
            'element' => Notice::get('error'),
        ]);
    }
}
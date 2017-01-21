<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Galeria;
use App\Http\Requests;
use GeneaLabs\Phpgmaps\Facades\PhpgmapsFacade;

class PrincipalController extends Controller
{
    public function index(){
        $publicaciones=Publicacion::paginate(10);
		return view('principal.index',compact('publicaciones'));
	}

	public function noticias(){
        $publicaciones=Publicacion::paginate(10);
		return view('principal.noticias',compact('publicaciones'));
	}

	public function instalaciones(){
		return view('principal.instalaciones');
	}

  public function QuienesSomos(){
    return view('principal.QuienesSomos');
  }

  public function GaleriaFotos(){
    $Fotos= Galeria::all();
    return view('principal.Galeria',compact('Fotos'));
  }


	public function contacto(){
		$config = array();
        $config['center'] = '4.5499848, -74.1067184';
        $config['map_width'] = 400;
        $config['map_height'] = 308;
        $config['zoom'] = 15;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(4.547728, -74.107783)
            });
        }
        centreGot = true;';
        //position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())

        \Gmaps::initialize($config);

        // Colocar el marcador
        // Una vez se conozca la posición del usuario
        $marker = array();
        \Gmaps::add_marker($marker);

        $map = \Gmaps::create_map();

        //Devolver vista con datos del mapa
        return view('principal.contacto', compact('map'));
	}
}

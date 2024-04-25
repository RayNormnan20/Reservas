<?php
    class Servicio  extends Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
           

            $data['title'] = 'Servicio';
            $this -> views -> getView('principal/servicios/index', $data);
        }
        
    }
    


?>
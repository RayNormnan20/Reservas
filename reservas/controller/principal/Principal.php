<?php
    class Principal  extends Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
           
            $this -> views -> getView('principal', 'index');
        }
        
    }
    


?>
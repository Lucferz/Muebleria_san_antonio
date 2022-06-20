<?php
    require_once("../DatosDAO/taxesDAO.php");
    class taxesControl
    {
        private $taxDAO;
        public function __construct(){
            $this->taxDAO = new taxesDAO();
        }
        public function create($tax = array()){
            return $this->taxDAO->create($tax);
        }
        public function read($id = ''){
            return $this->taxDAO->read($id);
        }
        public function update( $tax = array()){
            return $this->taxDAO->update($tax);
        }
        public function delete($tax = array()){
            return $this->taxDAO->delete($tax);
        }
        public function reactivar($tax = array()){
            return $this->taxDAO->reactivar($tax);
        }
        public function __destruct(){
            unset($this->taxDAO);
        }
    }
    

?>
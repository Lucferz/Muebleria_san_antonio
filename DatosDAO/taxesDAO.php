<?php
    /**
     *
     */
    include_once("Base.php");
    class taxesDAO extends Base
    {
        public function create($tax = array()){
            foreach ($tax as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO taxes (id, name, iva, estado) VALUES ($id, '$name', $iva, true)";
            $this->set_query();
        }

        public function read($id = ''){
            $this->query = ($id == '')? "SELECT * FROM taxes"
            :"SELECT * FROM taxes t WHERE t.id = $id";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $tax = array()){
            foreach ($tax as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE taxes SET name = '$name', iva = $iva WHERE id =$id";
            $this->set_query();
        }

        public function delete($tax = array()){
            foreach ($tax as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE taxes SET estado = false WHERE id =$id";
            $this->set_query();
        }

        public function reactivar($tax = array()){
            foreach ($tax as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE taxes SET estado = true WHERE id =$id";
            $this->set_query();
        }
    }
?>
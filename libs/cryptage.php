<?php

Class Cryptage {

    public $_code;
    public $_array;

    public function hash() {
        $this->_array = array(
            'a' => '1a2',
            'b' => 'ba2',
            'c' => 'va2',
            'd' => '1a4',
            'e' => 'na3',
            'n' => '1a1',
            'z' => 'ya5'
        );

        $this->_code = substr(sha1(rand() . $this->_array), 0, Base::get()->config['cryptage']['nombre']);
    }

    public function generate() {
        for ($i = 0; $i < Base::get()->config['cryptage']['cle']; $i++) {
            $this->hash();
            Cryptage::insertDB($this->_code);
        }
    }

    public static function insertDB($value) {

        //$db->query('INSERT INTO');
        //en code vrai sa vas inserer dans la database
        /* echo $value;
          echo "<br/>"; */
    }

}

<?php

  namespace App\Traits;

  trait Encryptable {

    public function getAttribute($key) {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->aEncryptable) && !is_null($value)) {
            $value = decrypt($value);
            return $value;
        }
        else {
          return $value;
        }
    }

    public function setAttribute($key, $value) {
        if (in_array($key, $this->aEncryptable)) {
            $value = encrypt($value);
        }
        return parent::setAttribute($key, $value);
    }
  }
?>

<?php

namespace App\Presenters\Traits;

trait HasContactInformationPresenter
{
    public function email()
    {
        return $this->model->email ? $this->model->email : '-';
    }

    public function telephone()
    {
        return $this->model->telephone ? $this->phoneFormater($this->model->telephone) : '-';
    }

    protected function phoneFormater($number)
    {
        if (strlen($number) < 10) {
            return $number;
        }

        $countryCode = 0;

        if (strlen($number) > 10) {
            $countryCode = substr($number, 0, -10);
            $number = substr($number, -10);
        }

        // Mexico 55
        // Monterrey 81
        // Guadalajara 33
        $ladaTwoDigits = [55, 81, 33];
        $lada = substr($number, 0, 2);
        if (!in_array($lada, $ladaTwoDigits)) {
            $lada = substr($number, 0, 3);
        }
        $phone = substr($number, strlen($lada));
        $phone = substr_replace($phone, '-', -4, 0);

        $formatedString = "({$lada}) {$phone}";

        return $countryCode ? $countryCode . " " . $formatedString : $formatedString;
    }
}
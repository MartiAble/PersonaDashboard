<?php

namespace App\Controllers;


use App\Controllers\BaseController;

class Test extends BaseController
{
    public function index()
    {
		$data = '{"standart":{"Стандарт 2":{"start":"28.07.22","end":"","loan_interest":"2","exceptions":{"standart":"Стандарт Плюс","action":"Оптимальный Плюс","specaction":"Возможно всё Плюс"}}},"action":{"Оптимальный 2":{"start":"28.07.22","end":"","loan_interest":"1","exceptions":{"standart":"Стандарт Плюс","action":"Оптимальный Плюс","specaction":"Возможно всё Плюс"}}}}';
		$data = json_decode($data,true);
		echo '<pre>'; print_r($data); echo '</pre>';
    }
}

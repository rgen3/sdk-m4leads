<?php

require 'Autoloader.php';


// Вывод доступных ГЕО
//$countries = \Classes\CurlFabric::init('countries', array(
//    'id' => 200,
//    'domainId' => 258
//));
//var_dump($countries->result);

//// Добавление нового заказа
//$order = (\Classes\CurlFabric::init('orderAdd', array(
//    // Ваш partner ID
//    'partnerId' => 1, // Обязательное поле
//    // ID оффера на который, по которому вы отправляете заказ
//    'offerId' => 123, // Обязательное поле
//    // Имя покупателя из заявки
//    'fullName' => 'Иванов Иван Иванович', // Необязательное
//    // Телефон покупателя из заявки
//    'phone' => '+71234567890',  // Обязательное поле
//    // Комментарий к заказу
//    'comment' => 'Комментарий', // Необязательное поле
//    // Страна покупателя (Пример получения списка кодов стран далее)
//    'country' => $country_id, // Обязательное поле
//    // IP адресс покупателя
//    'ip' => '127.0.0.1', // Необязательное поле
//)))->getResult();

//var_dump($order->result);
//var_dump($order->info);

//// Получение списка статусов по заказам
// Так как получение статусов по заказам требует авторизации, вам необходимо указать токен
// Получить токен можно в личном кабинете на сайте
//\Classes\Methods\AbstractMethod::setToken('PLACE YOUR TOKEN HERE');
//$orderStatus = \Classes\CurlFabric::init('orderStatus', array('ordersId' => array(110056,11938397,11938403)));
//var_dump($orderStatus->result);
//var_dump($orderStatus->info);

//Получение списка заказов
// Так как получение статусов по заказам требует авторизации, вам необходимо указать токен
// Получить токен можно в личном кабинете на сайте
//\Classes\Methods\AbstractMethod::setToken('fH19b_IH2R821O2sowAT0akHcdk4fZaN');
//$orderList = \Classes\CurlFabric::init(
//    'orderList', array(
//        'dateTo' => date('Y-m-d', strtotime('now')), // Дата до которой нужно получить заказы
//        'dateFrom' => date('Y-m-d', strtotime('last Monday')), // Дата с которой нужно получить заказы
//        'page' => 0, // Страница для вывода начиная с 0
//        'limit' => 20 // Максимальное количество заказов для получения 100
//    )
//);
//var_dump($orderList->result);
//var_dump($orderList->info);

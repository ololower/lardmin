<?php

namespace Ctrlv\Lardmin\ClientInterfaces;

/**
 * Гарантируем что у класса, реализующего интерфейс есть набор полей
 * для отображения в таблицах
 * Interface LardminList
 * @package Ctrlv\Lardmin\ClientInterfaces
 */
interface LardminList {

    public function getListProps() : array;

}

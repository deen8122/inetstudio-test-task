<?php
/*
 *
 */
$array = [
    ["id" => 1, "date" => "12.01.2020", "name" => "test1" ],
  ["id" => 2, "date" => "02.05.2020", "name" => "test2" ],
  ["id" => 4, "date" => "08.03.2020", "name" => "test4" ],
  ["id" => 1, "date" => "22.01.2020", "name" => "test1" ],
  ["id" => 2, "date" => "11.11.2020", "name" => "test4" ],
  ["id" => 3, "date" => "06.06.2019", "name" => "test3" ],
];


/*
 * ====================================================================
 */
echo '<h3>1 выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.</h3>';
$arTemp = [];
$array1 = array_map(function($value) use (&$arTemp) {
    if(in_array($value["id"] , $arTemp)){
        return false;
    }
    $arTemp[] = $value["id"];
    return$value;
},$array);
$array1 = array_filter($array1);
l($array1);
/*
 * ====================================================================
 */
echo '<h3>2 отсортировать многомерный массив по ключу (любому)</h3>';
$key = "date";
usort($array, function ($item1, $item2) use ($key) {
    if($key == 'date'){
        $item1["date"] = strtotime($item1["date"]);
        $item2["date"] = strtotime($item2["date"]);
    }
    return $item1[$key] <=> $item2[$key];
});
l($array);


/*
 * ====================================================================
 */
echo '<h3>3 вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)</h3>';
$array3 = array_column($array, "date");
l($array3);



/*
 * ====================================================================
 */
echo '<h3>4 изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)</h3>';
$array4 = [];
 array_map(function($value) use (&$array4) {
     $array4[$value['name']] = $value['id'];
},$array);
l($array4);















function l(array $arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
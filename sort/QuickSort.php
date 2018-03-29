<?php

/*
 * 重新排序数列，所有元素比基准值小的摆放在基准前面
 * 所有元素比基准值大的摆在基准的后面（相同的数可以到任一边）。
 * 递归地（recursive）把小于基准值元素的子数列和大于基准值元素的子数列排序
 */   
     
function quickSort($array)
{
    if(!isset($array[1]))
        return $array;
    $mid = $array[0]; //获取一个用于分割的关键字，一般是首个元素
    $leftArray = array();
    $rightArray = array();

    foreach($array as $v)
    {
        if($v > $mid)
            $rightArray[] = $v;  //把比$mid大的数放到一个数组里
        if($v < $mid)
            $leftArray[] = $v;   //把比$mid小的数放到另一个数组里
    }

    $leftArray = quickSort($leftArray); //把比较小的数组再一次进行分割
    $leftArray[] = $mid;        //把分割的元素加到小的数组后面，不能忘了它哦

    $rightArray = quickSort($rightArray);  //把比较大的数组再一次进行分割
    return array_merge($leftArray,$rightArray);  //组合两个结果
}

$arr = [5, 1, 6, 7, 4, 3, 77, 33];

$result = quickSort($arr);

print_r($result);



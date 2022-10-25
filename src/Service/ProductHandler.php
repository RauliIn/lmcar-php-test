<?php

namespace App\Service;

class ProductHandler
{

    /**
     * 計算商品總金額
     *
     * @param array $products 商品列表
     * @return integer 商品總金額
     */
    public static function getTotalPrice(array $products):int{
    
        if(empty($products)){
            return 0;
        }
        $totalPrice=0;
        foreach ($products as $product) {
            $price = $product['price'] ?? 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }
   
    /**
     * 查找符合条件并按照指定字段排序的商品列表
     *
     * @param array $products 商品列表
     * @param string $field 待搜索的字段
     * @param [int|string] $value 待搜索的值
     * @param string $sortField 排序字段
     * @param [int] $sort 排序类型 SORT_ASC 升序(默认) SORT_DESC 降序
     * @return array 结果集
     */
    public static function selectByFieldSortBySortField(array $products,string $field, $value,string $sortField,int $sort=SORT_ASC):array{
        if(empty($products)){
            return [];
        }
        $typeRes=self::selectFilterFieldValue($products,$field,$value);
        $sortRes=self::sortByField($typeRes,$sortField,$sort);
        return $sortRes;
    }
    /**
     *查找符合条件的商品列表
     *
     * @param array $products 商品列表
     * @param string $field 待搜索的字段
     * @param [int|string] $value 待搜索的值
     * @return array 结果集
     */
    public static function selectFilterFieldValue(array $products, string $field, $value):array
    {
        if(empty($products)){
            return [];
        }
        return array_filter($products, function ($v) use ($field, $value) {
            if (isset($v[$field])) {
                return $v[$field] == $value;
            }
        });
    }
    /**
    * 根据指定字段排序
    *
    * @param array $products 商品列表
    * @param string $field 待搜索的字段
    * @param [int] $sort 排序类型 SORT_ASC 升序(默认) SORT_DESC 降序
    * @return array 结果集
    */
    public static function sortByField(array $products, string $field, int $sort=SORT_ASC):array
    {
        if(empty($products)){
            return [];
        }
    
        $sortData = array_column($products, $field);
  
        array_multisort($sortData, $sort, $products);
        return $products;
    }
    /**
     * 格式化创建日期为UnixTimestamp
     *
     * @param array $products  商品列表
     * @return array 结果集
     */
    public static function date2UnixTimestamp(array $products):array{
        if(empty($products)){
            return [];
        }
        $key='create_at';
        foreach ($products as &$product) {
            # code...
            $product[$key]=strtotime($product[$key]) ?? 0;
            
        }
        return $products;
    
    }

}
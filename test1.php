<?php
//  Tạo mảng
$products = array(
    array("id" => 1, "name" => "Product 1", "price" => 10, "comb" => 5),
    array("id" => 2, "name" => "Product 2", "price" => 20, "comb" => null),
    array("id" => 3, "name" => "Product 3", "price" => 30, "comb" => 2),
    array("id" => 4, "name" => "Product 4", "price" => 40, "comb" => 1),
    array("id" => 5, "name" => "Product 5", "price" => 50, "comb" => null),
);
//  Khởi tạo một mảng trống để chứa kết quả
$result = array();

// Lặp qua từng sản phẩm trong mảng
foreach ($products as $product) {
   
    //  Nếu sản phẩm ko có giá trị comb thì bỏ qua
    if (is_null($product["comb"])) {
        continue;
    }
    //  Lấy id, name, price
    $productId = $product["id"];
    $productName = $product["name"];
    $productPrice = $product["price"];
    
    //  Nhận sản phẩm có giá trị comb
    $combProduct = null;
    foreach ($products as $item) {
        if ($item["id"] == $product["comb"]) {
            $combProduct = $item;
            break;
        }
    }
   
    // Nếu không tìm thấy sản phẩm nào thì bỏ qua
    if (!$combProduct) {
        continue;
    }
    
    $combProductId = $combProduct["id"];
    $combProductName = $combProduct["name"];
    $combProductPrice = $combProduct["price"];
    
    //  Cộng giá của sản phẩm hiện tại vào tổng giá sản phẩm đó
    if (!isset($result[$combProductName])) {
        $result[$combProductName] = array(
            "product_id" => $combProductId,
            "total" => $combProductPrice + $productPrice
        );
        
        // Nếu tên tồn tại chỉ cẩn thêm giá 
    } else {
        $result[$combProductName]["total"] += $productPrice;
    }
}

// In kết quả
foreach ($result as $productName => $data) {
    echo $productName . ": $" . $data["total"] . "\n";
}



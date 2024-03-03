<?php

include_once("db.php");

class coreFunction extends Database{     

    function setQuery($sql){
        $result = $this->conn->query($sql);

        if(!$result){
            die("Query failed: " . $this->conn->error);
        }        

        return $result;
    }


    function getAll($sql){
        $result = $this->setQuery($sql);
        $arr = array();
        while($row = $result -> fetch_assoc()){
            $arr[] =   $row;
        }

        return $arr;
    }

    function getOne($sql){
        $result =   $this->setQuery($sql);

        $arr = $result -> fetch_assoc();

        return $arr;
    }    

    function updateViews($id){
        $sql = "UPDATE PRODUCT SET views = views + 1 WHERE id = $id";
        $result = $this->setQuery($sql);
        if(!$result){
            die("Query failed: " . $this->conn->error);
        }  
    }

    function addRecord($table, $params = array()){        

        $sql = "INSERT INTO ". $table ."(";
        $txtKey = "";
        $txtValue = "";
        $i = 0;

        foreach($params as $key => $value){
            if($i<count($params) - 1){
                $txtKey .="".$key.",";
                $txtValue .= "'".$value."',";
            }
            else{
                $txtKey .="".$key."";
                $txtValue .= "'".$value."'";
            }
            $i++;
        }
        $sql .= $txtKey;
        $sql .= ") values(";

        $sql .= $txtValue;
        $sql .= ")";

        //echo $sql;

       $this->setQuery($sql);
    }   
    
    function editRecord($table, $id, $params = array()) {
        $sql = "UPDATE $table SET ";
        $updateValues = array();
        
        foreach ($params as $key => $value) {
            $updateValues[] = "$key = '$value'";
        }
    
        $sql .= implode(', ', $updateValues);
        $sql .= " WHERE id = $id"; // Sử dụng điều kiện WHERE để xác định record cần cập nhật.
    
        // Thực hiện truy vấn UPDATE
        $this->setQuery($sql);
    }

    function removeFromCart($product_id) {
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    }

    function addToCart($product_id, $quantity) {
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$product_id])) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ hàng với số lượng
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }

    function totalpages($sqlCountPages){
        // Kết nối đến cơ sở dữ liệu
        $host = 'localhost';
        $dbname = 'william';
        $username = 'root';
        $password = '';
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
        }
            
        // Số lượng mục trên mỗi trang
        $itemsPerPage = 8;
        
        // Tính toán số trang và tổng số mục
        $stmt = $conn->query($sqlCountPages);
        $totalItems = $stmt->fetchColumn();

        $totalPages = ceil($totalItems / $itemsPerPage);  
        return $totalPages;
    }

    function pagination($cur_page,$sqlCountPages,$sql){
        // Kết nối đến cơ sở dữ liệu
        $host = 'localhost';
        $dbname = 'william';
        $username = 'root';
        $password = '';
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
        }
            
        // Số lượng mục trên mỗi trang
        $itemsPerPage = 8;
        
        // Tính toán số trang và tổng số mục
        $stmt = $conn->query($sqlCountPages);
        $totalItems = $stmt->fetchColumn();

        $totalPages = ceil($totalItems / $itemsPerPage); 

        // Xác định trang hiện tại từ tham số trên URL
        $current_page = $cur_page;
        
        if ($current_page > $totalPages){
            $current_page =  $totalPages;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $itemsPerPage;

        // Truy vấn dữ liệu cho trang hiện tại
        $offset = ($current_page -1) * $itemsPerPage;
        
        $query = $sql." LIMIT $offset, $itemsPerPage";
        
        $stmt = $conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        return $result;
    }

    

}

?>
<?php
require_once 'config/database.php';
class BlooddonorModal{
    private $madg;
    private $name;
    private $gioitinh;
    private $namsinh;
    private $nghenghiep;
    private $ngaycapthe;
    private $ngayhethan;
    private $diachi;
    public function getAllBD(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM docgia";
        $result = mysqli_query($conn, $sql);
        $add_dg = [];
        if(mysqli_num_rows($result)>0){
            $add_dg = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $add_dg;
    }
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO docgia (madg, hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi)

        VALUES ('{$param['hovaten']}', '{$param['gioitinh']}', '{$param['namsinh']}', '{$param['nghenghiep']}', '{$param['ngaycapthe']}', '{$param['ngayhethan']}', '{$param['diachi']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    public function getBDById($madg = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM docgia WHERE madg={$madg}";
        $results = mysqli_query($connection, $querySelect);
        $Arr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $Arr = $bds[0];
        }
        $this->closeDb($connection);

        return $Arr;
    }
    public function update($dg = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE docgia 
        SET hovaten = '{$dg['hocvaten']}', gioitinh = '{$dg['gioitinh']}', namsinh = '{$dg['namsinh']}', nghenghiep = '{$dg['nghenghiep']}', ngaycapthe = '{$dg['ngaycapthe']}', ngayhethan = '{$dg['ngayhethan']}', diachi = '{$dg['diachi']}'  WHERE madg = {$dg['madg']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($madg = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM docgia WHERE madg = {$madg}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
}

?>
<?php

require_once 'model/docgia.php';
class docgia{
    function index(){
        $docgia = new docgia();
        $docgias = $docgias->getAllBD();
        require_once 'view/docgia/index.php';
    }
    function admin(){
        $docgia = new docgia();
        $docgias = $docgias->getAllBD();
        require_once 'view/docgia/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $name = $_POST['hovaten'];
            //$bd_sex = $_POST['bd_sex'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];
            if(empty($name) || empty($_POST['gioitinh'])|| empty( $namsinh) || empty($ghenghiep) || empty($bd_ngaycapthe) || empty($ngayhethan) || empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $gioitinh = $_POST['gioitinh'];
                $docgia = new docgia();
                $Arr = [
                    'hovaten' => $name,
                    'gioitinh' => $gioitinh,
                    'namsinh' => $namsinh,
                    'nghenghiep' => $nghenghiep,
                    'ngaycapthe' => $ngaycapthe,
                    'ngayhethan' => $ngayhethan,
                    'diachi' => $diachi,
                ];
                $isAdd = $docgia->insert($Arr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }

        }
        require_once 'view/docgia/add.php';
    }
    function edit(){
        if (!isset($_GET['madg'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=book&action=admin");
            return;
        }
        if (!is_numeric($_GET['madg'])) {
            $_SESSION['error'] = "madg phải là số";
            header("Location: index.php?controller=book&action=admin");
            return;
        }
        $id = $_GET['madg'];
        $docgia = new docgia();
        $DG = $docgia->getBDById($madg);
        $error = '';
        if(isset($_POST['submit'])){
            $name = $_POST['hovaten'];
            //$bd_sex = $_POST['bd_sex'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];
            if(empty($name) || empty($_POST['gioitinh'])|| empty( $namsinh) || empty($ghenghiep) || empty($bd_ngaycapthe) || empty($ngayhethan) || empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $gioitinh = $_POST['gioitinh'];
                $docgia = new docgia();
                $Arr = [
                    'madg'=>$madg,
                    'hovaten' => $name,
                    'gioitinh' => $gioitinh,
                    'namsinh' => $namsinh,
                    'nghenghiep' => $nghenghiep,
                    'ngaycapthe' => $ngaycapthe,
                    'ngayhethan' => $ngayhethan,
                    'diachi' => $diachi,
                ];
                $isAdd = $docgia->update($Arr);

                if ($isAdd) {
                    $TT= "Sửa thành công";
                }
                else {
                    $TT = "Sửa thất bại";
                }
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }
        }
        require_once 'view/docgia/edit.php';
    }
    function delete(){
        $madg = $_GET['madg'];
        if (!is_numeric($madg)) {
            header("Location: index.php?controller=book&action=index");
            exit();
        }
        $docgia = new docgia();
        $isDelete = $docgia->delete($madg);
        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=docgia&action=admin&tt=$TT");
        exit();
    }
}

?>
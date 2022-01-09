<?php
require 'view/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Chi Tiết Độc Giả</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=docgia&action=admin"><button class="btn btn-primary">Xem chi tiết</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã đọc giả</th>
                            <th scope="col">Tên độc giả</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Năm sinh</th>
                            <th scope="col">Nghề Nghiệp</th>
                            <th scope="col">Ngày cấp thẻ</th>
                            <th scope="col">Ngày cấp thẻ</th>
                            <th scope="col">Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($docgias as $dg) {
                        ?>
                            <tr>
                            <th scope="row"><?php echo $dg['madg'] ?></th>
                                <td><?php echo $dg['hovaten'] ?></td>
                                <td><?php echo $dg['gioitinh'] ?></td>
                                <td><?php echo $dg['namsinh'] ?></td>
                                <td><?php echo $dg['nghenghiep'] ?></td>
                                <td><?php echo $dg['ngaycapthe'] ?></td>
                                <td><?php echo $dg['ngayhethan'] ?></td>
                                <td><?php echo $dg['diachi'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
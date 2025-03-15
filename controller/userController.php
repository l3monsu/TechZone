<?php
class userController
{
    private $model;
    private $db;

    public function __construct()
    {
        require_once './model/UserModel.php';
        $this->model = new UserModel();
        $db = new Database();
    }

    function signup()
    {
        if (isset($_POST['submit'])) {
            $data['Ten_nguoiDung'] = $_POST['Ten_nguoiDung'];
            $data['Ho_nguoiDung'] = $_POST['Ho_nguoiDung'];
            $data['email_nguoiDung'] = $_POST['email_nguoiDung'];
            $data['sDt_nguoiDung'] = $_POST['sDt'];
            $data['matKhau_nguoiDung'] = $_POST['matKhau'];
            $this->model->signUp($data);
            
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                     Swal.fire({
                         icon: "success",
                         title: "Đăng ký thành công!",
                         text: "Bạn sẽ được chuyển đến trang đăng nhập ngay bây giờ.",
                         timer: 1500,
                         showConfirmButton: false
                     }).then(() => {
                         location.href = "index.php?page=login";
                     });
                 </script>';
        }
    }

    function userProfile()
    {
        require_once './view/user-profile.php';

        if (isset($_SESSION['ma_nguoiDung'])) {
            $ma_nguoiDung = $_SESSION['ma_nguoiDung'];
            $userInfo = $this->model->getUserInfo($ma_nguoiDung);

            if (!$userInfo) {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Không tìm thấy thông tin người dùng",
                            text: "Vui lòng kiểm tra lại.",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.href = "index.php?page=login";
                        });
                      </script>';
                return;
            }
            $role = $userInfo['vaiTro']; // Assuming 'role' column exists in your user table
            if ($role === '1') {
                echo '<script>
                        Swal.fire({
                            icon: "info",
                            title: "Chào mừng Admin!",
                            html: "Chuyển đến <a href="../admin/?mod=page&act=home">trang quản trị</a>.",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.href ="../Project1_Group-TechZone/admin/?mod=page&act=home";
                        });
                      </script>';
            } elseif ($role === '0') {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Chào mừng người dùng!",
                            text: "Chuyển đến trang người dùng.",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.href = "index.php?page=user";
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Vai trò không hợp lệ",
                            text: "Vui lòng liên hệ quản trị viên.",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.href = "index.php?page=login";
                        });
                      </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Chưa đăng nhập",
                        text: "Vui lòng đăng nhập để xem thông tin.",
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        location.href = "index.php?page=login";
                    });
                  </script>';
                  return;
        }
    }
}

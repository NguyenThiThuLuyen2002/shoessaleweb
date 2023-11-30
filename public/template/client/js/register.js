$(document).ready(function () {
    // Lắng nghe sự kiện khi người dùng nhập vào trường email
    $('input[name="email"]').on('input', function () {
        // Lấy giá trị từ trường email
        var emailValue = $(this).val().trim();

        // Kiểm tra xem có phải là địa chỉ email có đuôi là @gmail.com hay không
        var isValidEmail = /^[a-zA-Z0-9._-]+@gmail\.com$/.test(emailValue);

        // Hiển thị thông báo lỗi nếu không hợp lệ
        if (!isValidEmail) {
            $('#email-error').text('Email phải có đuôi @gmail.com');
        } else {
            $('#email-error').text('');
        }

        // Cập nhật trạng thái của nút Register
        // updateButtonState();
    });

    // Cập nhật trạng thái của nút Register
    function updateButtonState() {
        var name = $('input[name="name"]').val().trim();
        var email = $('input[name="email"]').val().trim();
        var password = $('input[name="password"]').val().trim();
        var confirmPassword = $('input[name="password_confirmation"]').val().trim();

        var isValid = name !== "" && email !== "" && password !== "" && confirmPassword !== "";
        isValid = isValid && /^[a-zA-Z0-9._-]+@gmail\.com$/.test(email);

        $('button[type="submit"]').prop('disabled', !isValid);
    }
});    
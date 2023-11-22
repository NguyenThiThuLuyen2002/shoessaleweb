// add image
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image-input").on('change', function() {
        readURL(this);
    });
});

// add detail
$(document).ready(function () {
    // Xử lý sự kiện click nút "Xóa"
    $("#detail-container").on("click", ".js-remove-row", function() {
        var row = $(this).closest('.row');
        row.remove();
    });

    $("#add-new-detail").on("click", function() {
        // if (isFormValid()) {
            addNewRow();
        // } else {
        //     alert("Vui lòng điền đầy đủ thông tin");
        // }
    });

    // function isFormValid() {
    //     // Kiểm tra xem tất cả các ô input có giá trị không
    //     var isValid = true;
    //     $("#detail-container .row:first input").each(function() {
    //         if ($(this).val() === '') {
    //             isValid = false;
    //             return false; // Thoát khỏi vòng lặp nếu có ô input không có giá trị
    //         }
    //     });
    //     return isValid;
    // }

    function addNewRow() {
        // Sao chép hàng đầu tiên
        var lastRowIndex = $("#detail-container .detail-row").length;
        var newRow = $("#detail-container .detail-row:first").clone();

        // Tăng chỉ mục của chi tiết sản phẩm trong tên ô input
        newRow.find('input').each(function() {
            var name = $(this).attr('name');
            var matches = name.match(/\[(\d+)\]/);
            if (matches) {
                var newIndex = parseInt(matches[1]) + 1;
                name = name.replace(/\[(\d+)\]/, '[' + newIndex + ']');
                $(this).attr('name', name);
            }
        });
        
        // Xóa giá trị của các ô input trong hàng mới
        newRow.find('input').val('');

        // Đặt ảnh về trạng thái rỗng trong hàng mới
        newRow.find('.show-image-detail').attr('src', '');

        // Thêm nút xóa và sự kiện xóa vào hàng mới
        newRow.find('.col-sm-1').html('<div class="col-sm-1"><div class="form-group"><button type="button" class="btn btn-danger js-remove-row mt-4">Xóa</button></div></div>');

        // Thêm hàng mới vào cuối #detail-container
        $("#detail-container").append(newRow);

        // Cập nhật sự kiện change cho input file
        $('.image-input-detail:last').off('change').on('change', handleImageChange);
    }

    // Sự kiện thay đổi của input file
    function handleImageChange() {
        var showImage = $(this).closest('.row').find('.show-image-detail');
        readURL(this, showImage);
    }

    // Hiển thị hình ảnh đã chọn
    function readURL(input, showImage) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                showImage.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Cập nhật sự kiện change cho input file khi trang được tải
    $('.image-input-detail').on('change', handleImageChange);
});


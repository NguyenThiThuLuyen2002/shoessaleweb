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
$(document).ready(function() {
    // Xử lý sự kiện click nút "Xóa"
    $("#detail-container").on("click", ".js-remove-row", function() {
        var row = $(this).closest('.row');
        row.remove();
    });

    $("#add-new-detail").on("click", function() {
        addNewRow();
    });

    function addNewRow() {
        // Sao chép hàng đầu tiên
        var newRow = $("#detail-container .row:first").clone();

        // Xóa giá trị của các ô input trong hàng mới
        newRow.find('input').val('');

        // Đặt ảnh về trạng thái rỗng trong hàng mới
        newRow.find('.show-image-detail').attr('src', '');

        // Thêm nút xóa vào hàng mới
        var deleteColumn =
            '<div class="col-sm-1"><div class="form-group"><button type="button" class="btn btn-danger js-remove-row mt-4">Xóa</button></div></div>';
        newRow.append(deleteColumn);

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

            reader.onload = function(e) {
                showImage.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Cập nhật sự kiện change cho input file khi trang được tải
    $('.image-input-detail').on('change', handleImageChange);
});
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_role'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    // Các trường của bảng field_image
    protected $fillable = ['id_role', 'username','created_at','updated_at'];
    
}

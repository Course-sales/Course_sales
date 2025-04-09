<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Student\src\Models\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Nguyễn Văn Thuận',
                'email' => 'thuan@gmail.com',
                'phone' => '0973314654',
                'password' => Hash::make('123456'),
                'address' => 'Tp. Hồ Chí Minh',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Nguyễn Thị Cẩm Ly',
                'email' => 'camly@gmail.com',
                'phone' => '0973314654',
                'password' => Hash::make('123456'),
                'address' => 'Tp. Hồ Chí Minh',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Trần Minh Tuấn',
                'email' => 'minhtuan@gmail.com',
                'phone' => '0973216548',
                'password' => Hash::make('123456'),
                'address' => 'Hà Nội',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lê Thanh Bình',
                'email' => 'binh@gmail.com',
                'phone' => '0973456789',
                'password' => Hash::make('123456'),
                'address' => 'Đà Nẵng',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Phạm Thị Bích Ngọc',
                'email' => 'ngoc@gmail.com',
                'phone' => '0973314655',
                'password' => Hash::make('123456'),
                'address' => 'Bình Dương',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Vũ Minh Tú',
                'email' => 'minhtu@gmail.com',
                'phone' => '0973668999',
                'password' => Hash::make('123456'),
                'address' => 'Hải Phòng',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Nguyễn Đăng Khoa',
                'email' => 'khoa@gmail.com',
                'phone' => '0973789023',
                'password' => Hash::make('123456'),
                'address' => 'Cần Thơ',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Đặng Thị Lan',
                'email' => 'lan@gmail.com',
                'phone' => '0973948231',
                'password' => Hash::make('123456'),
                'address' => 'Bắc Giang',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lê Minh Trí',
                'email' => 'minhtri@gmail.com',
                'phone' => '0973156468',
                'password' => Hash::make('123456'),
                'address' => 'Hồ Chí Minh',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Nguyễn Quốc Duy',
                'email' => 'quocduy@gmail.com',
                'phone' => '0973234567',
                'password' => Hash::make('123456'),
                'address' => 'Quảng Ngãi',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Phan Thanh Long',
                'email' => 'thanhlong@gmail.com',
                'phone' => '0973458012',
                'password' => Hash::make('123456'),
                'address' => 'Hà Nội',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Đoàn Thị Kim Liên',
                'email' => 'kimlien@gmail.com',
                'phone' => '0973987456',
                'password' => Hash::make('123456'),
                'address' => 'Phú Yên',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Trần Thị Mỹ Linh',
                'email' => 'mylinh@gmail.com',
                'phone' => '0973314652',
                'password' => Hash::make('123456'),
                'address' => 'Nghệ An',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Nguyễn Minh Quang',
                'email' => 'quang@gmail.com',
                'phone' => '0973314651',
                'password' => Hash::make('123456'),
                'address' => 'Hồ Chí Minh',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lâm Hoàng Nam',
                'email' => 'hoangnam@gmail.com',
                'phone' => '0973798453',
                'password' => Hash::make('123456'),
                'address' => 'Bình Thuận',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Trần Quang Hải',
                'email' => 'quanghai@gmail.com',
                'phone' => '0973123456',
                'password' => Hash::make('123456'),
                'address' => 'Hồ Chí Minh',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Phạm Hồng Sơn',
                'email' => 'son@gmail.com',
                'phone' => '0973432109',
                'password' => Hash::make('123456'),
                'address' => 'Vũng Tàu',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Trần Vĩnh Hậu',
                'email' => 'vinhhao@gmail.com',
                'phone' => '0973154678',
                'password' => Hash::make('123456'),
                'address' => 'Đồng Nai',
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lê Tiến Dũng',
                'email' => 'tiendung@gmail.com',
                'phone' => '0973321456',
                'password' => Hash::make('123456'),
                'address' => 'Thanh Hóa',
                'status' => 1,
                'email_verified_at' => now(),
            ],
        ];
        $newStudent = new Student();
        foreach($students as $student) {
            $newStudent->create($student);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Teacher\src\Models\Teacher;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Nguyễn Trọng Tấn',
                'slug' => 'nguyen-trong-tan',
                'description' => 'Giới thiệu về tôi, Nguyễn Trọng Tấn, tôi đã có hơn 10 năm kinh nghiệm giảng dạy lập trình C++. Trong suốt thời gian này, tôi đã giúp nhiều thế hệ sinh viên nắm vững kiến thức lập trình cơ bản và nâng cao, đồng thời phát triển các kỹ năng cần thiết để giải quyết các bài toán trong lĩnh vực công nghệ thông tin. Tôi luôn tận tâm với nghề, không ngừng tìm tòi và cập nhật những xu hướng mới trong lập trình để mang đến cho học viên những kiến thức thực tiễn và hữu ích nhất.',
                'exp' => 10,
                'image' => 'empty',
            ],
            [
                'name' => 'Trần Văn Bảo',
                'slug' => 'tran-van-bao',
                'description' => 'Trần Văn Bảo, giảng viên với hơn 8 năm kinh nghiệm trong việc giảng dạy lập trình Java. Tôi luôn mong muốn giúp học viên làm chủ được ngôn ngữ Java và ứng dụng nó trong phát triển phần mềm hiệu quả.',
                'exp' => 8,
                'image' => 'empty',
            ],
            [
                'name' => 'Phạm Minh Hoàng',
                'slug' => 'pham-minh-hoang',
                'description' => 'Phạm Minh Hoàng là giảng viên chuyên dạy JavaScript với 6 năm kinh nghiệm. Tôi luôn truyền đạt cho học viên những kiến thức vững vàng để làm việc với front-end và back-end hiệu quả bằng JavaScript.',
                'exp' => 6,
                'image' => 'empty',
            ],
            [
                'name' => 'Lê Quốc Duy',
                'slug' => 'le-quoc-duy',
                'description' => 'Lê Quốc Duy với hơn 7 năm kinh nghiệm giảng dạy C# cho sinh viên. Tôi mong muốn giúp học viên phát triển các ứng dụng phần mềm mạnh mẽ và tối ưu hiệu suất sử dụng C#.',
                'exp' => 7,
                'image' => 'empty',
            ],
            [
                'name' => 'Trần Thị Bích Liên',
                'slug' => 'tran-thi-bich-lien',
                'description' => 'Trần Thị Bích Liên, giảng viên lập trình React, với 6 năm kinh nghiệm. Tôi giảng dạy các khóa học từ cơ bản đến nâng cao trong việc phát triển ứng dụng web tương tác cao với React.',
                'exp' => 6,
                'image' => 'empty',
            ],
            [
                'name' => 'Nguyễn Thị Thanh Tâm',
                'slug' => 'nguyen-thi-thanh-tam',
                'description' => 'Giảng viên lập trình PHP với hơn 9 năm kinh nghiệm. Tôi luôn cố gắng giúp học viên phát triển các ứng dụng web hiệu quả và tối ưu với PHP.',
                'exp' => 9,
                'image' => 'empty',
            ],
            [
                'name' => 'Vũ Thị Hồng Ánh',
                'slug' => 'vu-thi-hong-anh',
                'description' => 'Giảng viên lập trình Python với hơn 6 năm kinh nghiệm. Tôi giúp học viên phát triển các ứng dụng phân tích dữ liệu và trí tuệ nhân tạo sử dụng Python.',
                'exp' => 6,
                'image' => 'empty',
            ],
        ];
        $newTeacher = new Teacher();
        foreach($teachers as $teacher) {
            $newTeacher->create($teacher);
        }
        
    }
}

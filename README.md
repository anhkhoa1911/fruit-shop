# Website Cửa Hàng Trái Cây

Website bán trái cây được xây dựng bằng Laravel 12 với giao diện Organic Food Store Template.

## Tính năng

### Phần Admin

- Quản lý danh mục sản phẩm (CRUD)
- Quản lý sản phẩm (CRUD) với các thuộc tính:
  - Tên, mô tả, giá, giá khuyến mãi
  - Hình ảnh
  - Trạng thái: Nổi bật, Mới, Giảm giá, Hoạt động
- Quản lý cài đặt:
  - Thông tin liên hệ (Địa chỉ, Email, Số điện thoại)
  - Trang giới thiệu
  - Mạng xã hội
- Dashboard với thống kê tổng quan
- Xác thực admin với Laravel Breeze

### Phần Frontend

- Trang chủ với sản phẩm nổi bật và mới
- Danh sách sản phẩm với phân trang
- Chi tiết sản phẩm
- Lọc sản phẩm theo danh mục
- Tìm kiếm sản phẩm
- Trang giới thiệu
- Trang liên hệ
- Responsive design

## Cài đặt

### Yêu cầu

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL hoặc SQLite

### Các bước cài đặt

1. Clone hoặc di chuyển đến thư mục dự án:

```bash
cd fruit-shop
```

1. Cài đặt dependencies:

```bash
composer install
npm install
```

1. Tạo file .env (nếu chưa có):

```bash
cp .env.example .env
```

1. Generate application key:

```bash
php artisan key:generate
```

1. Cấu hình database trong file .env:

```
DB_CONNECTION=sqlite
# Hoặc nếu dùng MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=fruit_shop
# DB_USERNAME=root
# DB_PASSWORD=
```

1. Chạy migrations và seeders:

```bash
php artisan migrate:fresh --seed
```

1. Tạo symbolic link cho storage:

```bash
php artisan storage:link
```

1. Build assets:

```bash
npm run build
```

1. Khởi động server:

```bash
php artisan serve
```

Website sẽ chạy tại: <http://localhost:8000>

## Tài khoản mặc định

### Admin

- Email: <admin@fruitshop.vn>
- Password: password

## Cấu trúc dự án

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Controllers cho admin panel
│   │   │   ├── DashboardController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── ProductController.php
│   │   │   └── SettingController.php
│   │   ├── HomeController.php
│   │   └── ProductController.php
│   └── Middleware/
│       └── IsAdmin.php     # Middleware kiểm tra quyền admin
├── Models/
│   ├── Category.php
│   ├── Product.php
│   ├── Setting.php
│   └── User.php
database/
├── migrations/             # Database migrations
└── seeders/               # Database seeders
resources/
└── views/
    ├── admin/             # Views cho admin panel
    │   ├── categories/
    │   ├── products/
    │   ├── settings/
    │   └── dashboard.blade.php
    ├── layouts/
    │   ├── admin.blade.php
    │   └── app.blade.php
    ├── products/          # Views sản phẩm
    ├── home.blade.php
    ├── about.blade.php
    └── contact.blade.php
```

## Các trang chính

### Frontend

- Trang chủ: `/`
- Sản phẩm: `/san-pham`
- Chi tiết sản phẩm: `/san-pham/{slug}`
- Danh mục: `/danh-muc/{slug}`
- Giới thiệu: `/gioi-thieu`
- Liên hệ: `/lien-he`

### Admin

- Dashboard: `/admin`
- Danh mục: `/admin/categories`
- Sản phẩm: `/admin/products`
- Cài đặt: `/admin/settings`

## Lưu ý

1. Template sử dụng các file CSS/JS/Images từ CDN bên ngoài. Nếu muốn sử dụng local, cần tải về và đặt vào thư mục `public`.

2. Khi upload hình ảnh, file sẽ được lưu trong `storage/app/public` và có thể truy cập qua `/storage`.

3. Để thay đổi thông tin website (logo, thông tin liên hệ, mạng xã hội), vào trang Cài đặt trong Admin.

## Công nghệ sử dụng

- Laravel 12
- Laravel Breeze (Authentication)
- Tailwind CSS
- Bootstrap 3 (Template)
- SQLite/MySQL

## License

MIT License

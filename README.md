# 🏔️ Mountain Gear Rental System

> **Sistem Manajemen Penyewaan Peralatan Hiking** berbasis Laravel dengan Filament Admin Panel dan RESTful API

[![Laravel](https://img.shields.io/badge/Laravel-12.0-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Filament](https://img.shields.io/badge/Filament-3.3-orange.svg)](https://filamentphp.com)
[![Docker](https://img.shields.io/badge/Docker-Ready-blue.svg)](https://docker.com)
[![API](https://img.shields.io/badge/API-OpenAPI%203.0-green.svg)](https://swagger.io)

## 🚀 Features

### 🎛️ Admin Panel (Filament)
- **Dashboard**: Real-time statistics dan metrics
- **Equipment Management**: CRUD inventori dengan kategori
- **Customer Database**: Manajemen data pelanggan
- **Rental Processing**: Workflow penyewaan end-to-end
- **Payment Tracking**: Monitor pembayaran dan deposit
- **User Management**: Role-based access control
- **Activity Logging**: Audit trail lengkap

### 🔌 RESTful API
- **Equipment API**: CRUD dengan filtering dan search
- **Rental API**: Manajemen penyewaan dan status tracking
- **Interactive Documentation**: Swagger UI di `/documentation`
- **API Key Authentication**: Secure access control

## 🏗️ Tech Stack

| Component | Technology | Version |
|-----------|------------|---------|
| **Backend** | Laravel | 12.0+ |
| **Admin Panel** | Filament | 3.3+ |
| **Database** | MariaDB | 10.11+ |
| **Web Server** | Nginx + SSL | 1.20+ |
| **PHP Runtime** | PHP-FPM | 8.2+ |
| **Frontend** | Tailwind CSS + Livewire | Latest |
| **API Docs** | L5 Swagger | 9.0+ |

## 🐳 Quick Start

### Prerequisites
- Docker & Docker Compose
- Git
- Ports 80, 443, 23306 available

### Installation

1. **Clone & Setup**
```bash
git clone <repository-url>
cd template_uas_pemweb
cd src && cp .env.example .env
```

2. **Start Services**
```bash
docker-compose up -d
```

3. **Install Dependencies**
```bash
docker exec -it pemweb bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan shield:install --fresh
php artisan l5-swagger:generate
```

### 🌐 Access Points

| Service | URL | Credentials |
|---------|-----|-------------|
| **Main App** | https://pemweb.uas | - |
| **Admin Panel** | https://pemweb.uas/admin | admin@admin.com |
| **API Docs** | https://pemweb.uas/documentation | API Key required |

## 📡 API Usage

### Authentication
```bash
curl -H "X-API-KEY: your-api-key" https://pemweb.uas/api/hiking-equipment
```

### Equipment Endpoints
```bash
GET    /api/hiking-equipment        # List equipment
POST   /api/hiking-equipment        # Create equipment
GET    /api/hiking-equipment/{id}   # Get equipment
PUT    /api/hiking-equipment/{id}   # Update equipment
DELETE /api/hiking-equipment/{id}   # Delete equipment
```

### Rental Endpoints
```bash
GET    /api/rentals                 # List rentals
POST   /api/rentals                 # Create rental
GET    /api/rentals/{id}            # Get rental
PUT    /api/rentals/{id}/status     # Update status
```

## 🗄️ Database Schema

### Core Tables
```
categories          # Equipment categories
hiking_equipments   # Equipment inventory  
customers          # Customer database
rentals           # Rental transactions
rental_items      # Rental line items
payments          # Payment records
users             # System users
```

## 🔧 Configuration

### Key Environment Variables
```env
APP_NAME="Mountain Gear Rental"
APP_URL=https://pemweb.uas
DB_CONNECTION=mariadb
API_KEY=your-secret-api-key
```

## 📊 Business Features

### Rental Management
- **Multi-day rentals** with automatic pricing
- **Security deposits** and late fee calculation
- **Equipment condition tracking**
- **Photo documentation** for pickup/return
- **Customer verification** with ID requirements

### Inventory Control
- **Real-time stock tracking**
- **Category-based organization**
- **Detailed specifications** (JSON format)
- **Multiple images** per equipment
- **Maintenance scheduling**

### Payment System
- **Multiple payment methods** (Cash, Transfer, E-wallet)
- **Deposit management**
- **Late fee automation**
- **Damage fee assessment**
- **Refund processing**

## 🚀 Deployment

### Production Checklist
- [ ] Update SSL certificates
- [ ] Configure production .env
- [ ] Set up database backups
- [ ] Configure monitoring
- [ ] Test API security

### Performance Tips
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📝 Documentation

- **System Analysis**: Complete technical architecture
- **SRS Document**: Detailed requirements specification
- **BRD Document**: Business requirements and processes
- **ERD Diagram**: Database relationships and schema
- **API Documentation**: Interactive Swagger UI

> 📋 **Full Documentation**: See [SYSTEM_DOCUMENTATION.md](SYSTEM_DOCUMENTATION.md) for comprehensive analysis

## 🛠️ Development

### File Structure
```
src/
├── app/
│   ├── Filament/Admin/Resources/     # Admin panels
│   ├── Http/Controllers/Api/         # API controllers  
│   ├── Models/                       # Eloquent models
│   ├── OpenApi/                      # API documentation
│   └── Policies/                     # Authorization
├── database/
│   ├── migrations/                   # Database schema
│   └── seeders/                      # Sample data
└── routes/
    ├── api.php                       # API routes
    └── web.php                       # Web routes
```

### Key Models
- **HikingEquipment**: Equipment inventory
- **Rental**: Rental transactions
- **Customer**: Customer database
- **RentalItem**: Rental line items
- **Payment**: Payment records

## 🔐 Security

- **API Key Authentication** for external access
- **Role-based Access Control** with Spatie Permissions
- **HTTPS Encryption** with SSL certificates
- **Input Validation** on all endpoints
- **Activity Logging** for audit trails

## 🆘 Troubleshooting

### Common Issues

**Port conflicts:**
```bash
sudo lsof -i :80 :443
```

**Database connection:**
```bash
docker logs db
```

**Permission errors:**
```bash
sudo chown -R www-data:www-data src/storage
```

## 📞 Support

**Documentation**: https://pemweb.uas/documentation  
**Admin Panel**: https://pemweb.uas/admin  
**Health Check**: https://pemweb.uas/up

---

*🏔️ Built for outdoor enthusiasts who need reliable gear rental management*

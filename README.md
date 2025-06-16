# bakso-ojolali
web bakso ojolali menggunakan laravel + sqlite

## Getting Started

### Step1: Clone Project
```bash
git clone https://github.com/dikayo05/bakso-ojolali.git
cd bakso-ojolali
```

### Step2: Install Dependencies
```bash
composer install
npm install
npm run build
```

### Step3: Add Requirement
```bash
rename .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate
php artisan db:seed
```

## How to Run
```bash
php artisan serve
```
or
```bash
composer run dev
```
# Pura Agung Kertajaya - PHP Version (Laravel)

This project is a web-based information system for **Pura Agung Kertajaya**. While the primary production version is built with Next.js, this repository contains the **PHP/Laravel implementation** developed to meet specific academic requirements and demonstrate full-stack capabilities using the TALL stack (Tailwind, Alpine.js, Laravel, Livewire/Blade).

## 🚀 Features

- **Responsive Landing Page**: Built with Laravel Blade and Tailwind CSS.
- **Dynamic Content**: Data fetched from a centralized REST API.
- **Interactive Elements**:
    - Image Gallery with Lightbox (Alpine.js).
    - Infinite Testimonial Slider (Pure CSS/Tailwind).
    - Facilities Tab System.
    - Organization Structure Hierarchical Display.
- **Dark Mode Support**: System-aware and manual toggle with persistent storage.
- **SEO Optimized**: Metadata management for all pages.

## 🛠️ Tech Stack

- **Framework**: [Laravel 12](https://laravel.com)
- **Frontend**: [Tailwind CSS](https://tailwindcss.com), [Alpine.js](https://alpinejs.dev)
- **Animations**: [AOS (Animate On Scroll)](https://michalsnik.github.io/aos/), [Lottie Files](https://lottiefiles.com/)
- **Build Tool**: [Vite](https://vitejs.dev)

## 📦 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/JonathanGunawan30/pura-agung-kertajaya-laravel.git
    ```

2. **Install PHP Dependencies**
   ```bash
   composer install
    ```

3. **Install JavaScript Dependencies**
   ```bash
   npm install
    ```

4. **Environment Setup**
- Copy .env.example to .env
- Configure your API_BASE_URL to point to the backend service.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Compile Assets**
   ```bash
   npm run dev
   # or for production
   npm run build
   ```

6. **Run the Server**
   ```bash
   php artisan serve
   ```

## 🌐 Deployment
- **This version is optimized for deployment on platforms like Railway, Render, or a traditional VPS.**:
    - Production Build: Ensure npm run build is executed so that Vite assets are properly manifested.
    - Caching: The system uses Laravel Cache to optimize API response times from the centralized data source.

---

*Note: This repository is intended for academic purposes as an alternative implementation of the original Next.js project.*

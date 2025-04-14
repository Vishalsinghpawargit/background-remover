<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 🖼️ Image Background Remover – Laravel + Python

This project is a simple and efficient **image background remover** built using **Laravel** and **Python**. It allows users to upload an image and removes its background using a Python script integrated with Laravel.

---

## ✨ Features

- Upload image and remove background in one click.
- Python script using `rembg` processes the background removal.
- Clean UI built with Laravel Blade.
- Stores original and processed images.
- Handles `.png`, `.jpg`, `.jpeg` formats.
- Logs errors and supports reusable structure.

---

## ⚙️ Tech Stack

- **Laravel** – Web framework and file management
- **Python** – Image background removal engine
- **Shell Script** – Triggers Python from Laravel
- **rembg** – Python library for background removal
- **Storage** – Laravel public disk for input/output files

---

## 📦 Installation Guide

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/laravel-bgremove.git
cd laravel-bgremove

# 🛍️ Laravel MyShop

A simple e-commerce style web application built with **Laravel** and **AWS**.  
This project demonstrates the full-stack development process — from CRUD implementation and image upload to CI/CD automation.

LaravelとAWSを使用して構築した、シンプルなECサイト風のWebアプリケーションです。  
商品管理（CRUD）、検索、画像アップロード、自動デプロイまで、Web開発の基本的な流れを一通り実装しています。

---

## 🚀 Features / 主な機能

- 🧩 **Product CRUD** — 商品の登録・一覧・編集・削除  
- 🔍 **Search Function** — 商品名で部分一致検索が可能  
- 🖼️ **Image Upload** — AWS S3に画像をアップロードし、URLで表示  
- 🎨 **Responsive UI** — Tailwind CSSによるモダンでシンプルなデザイン  
- ⚙️ **Auto Deployment** — GitHub ActionsでEC2へ自動デプロイ

---

## 🧱 Tech Stack / 使用技術

| Category | Technology |
|-----------|-------------|
| Framework | Laravel 10 |
| Language | PHP 8.x |
| Frontend | Blade / Tailwind CSS |
| Database | MySQL / MariaDB |
| Infra | AWS EC2 / S3 |
| CI/CD | GitHub Actions |
| Tools | Composer / npm / Git |

---

## 🖥️ System Overview / システム構成

Mac (Local Development)  
  
↓ Push  
  
GitHub Repository  
  
↓ Trigger  
   
GitHub Actions (CI/CD Workflow) 
  
↓ Deploy via SSH  
  
AWS EC2 (Nginx + PHP + MySQL)  
  
↓  
  
AWS S3 (Image Storage)  

---

## 🗒️ What I Learned / 学んだこと

- LaravelでのCRUD機能構築とMVC設計の理解  
- AWS EC2上での環境構築・デプロイの流れ  
- AWS S3とのストレージ連携（画像アップロード）  
- GitHub Actionsを用いた自動デプロイパイプライン構築  
- Tailwind CSSによるシンプルなUI設計  

---

## 📄 License
This project is open-source and available under the [MIT License](./LICENSE).

---

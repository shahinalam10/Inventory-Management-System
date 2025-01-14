# Inventory Management System

## Overview

This project is a simple Inventory Management System built with Laravel 10. It allows users to manage brands, models, and items in an organized and easy-to-use manner. The system supports the creation, viewing, and editing of brands, models, and items, with dynamic features such as selecting models based on the selected brand.

## Features

- **Brand Management**: Add, view, and edit brands.
- **Model Management**: Add, view, and edit models associated with a specific brand.
- **Item Management**: Add, view, and edit items, and link them to both a brand and a model.
- **Dynamic Model Dropdown**: The model dropdown dynamically updates based on the selected brand.

## Technologies Used

- **Backend**: Laravel 10
- **Frontend**: HTML, Bootstrap 5, jQuery
- **Database**: MySQL (or any other relational database supported by Laravel)
- **Version Control**: Git, GitHub

## Installation

Follow these steps to install and run the project locally:

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/inventory-management.git
    ```

2. Navigate to the project directory:
    ```bash
    cd inventory-management
    ```

3. Install project dependencies:
    ```bash
    composer install
    ```

4. Copy `.env.example` to `.env` and configure your database and other environment variables:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Run the migrations to create the necessary database tables:
    ```bash
    php artisan migrate
    ```

7. Serve the application:
    ```bash
    php artisan serve
    ```

    Your application will be available at `http://127.0.0.1:8000`.

## Usage

- **Brand Management**: Navigate to the "Brand" section to add or view brands.
- **Model Management**: Navigate to the "Model" section to create models associated with a selected brand.
- **Item Management**: In the "Item" section, add items by selecting a brand and model.

## Contributing

Contributions are welcome! If you want to improve this project, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Make your changes.
4. Commit your changes (`git commit -am 'Add new feature'`).
5. Push to your forked repository (`git push origin feature-name`).
6. Create a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).

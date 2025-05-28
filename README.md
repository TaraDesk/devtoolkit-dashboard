# DevToolKit Dashboard

## Overview

**DevToolKit Dashboard** is a Laravel-based web application that provides a structured and searchable inventory of online developer tools. It includes a user-friendly interface for managing tools and a read-only RESTful API for retrieving and filtering tool data.

## Features

* **User Authentication**: Secure login system with role-based access control.
* **Role-Based Access**:
  * **Admin**: Full access to all dashboard features — can create, edit, and delete tools, categories, and tags.
  * **Staff**: Limited access — can view existing data and create new tools and categories, but cannot edit or delete.
* **Tool Management**:
  * Add and view developer tools with relevant metadata.
  * Organize tools using categories and tags for better structure and discoverability.
* **Categorization & Tagging**: Tools can be grouped into categories and tagged for easier filtering and search.
* **Read-Only API**:
  * Public RESTful API allows read-only access to tool data.
  * Supports filtering by category, tag, and keyword.
* **Responsive Design**: Clean, mobile-friendly UI built with Tailwind CSS.
* **UI Feedback**: Informative success and error messages displayed using Tailwind-styled Laravel flash sessions.

## Technologies Used

* **Frontend**: Tailwind CSS, Lucide Icons
* **Backend**: Laravel (PHP)
* **Database**: SQLite

## Installation

### Clone the Repository

```bash
git clone https://github.com/TaraDesk/salon-booking-system.git
cd devtoolkit-dashboard
```

### Install Dependencies

```bash
composer install
npm install && npm run dev
```

### Setup Environment

1. Copy the `.env` file:

   ```bash
   cp .env.example .env
   ```
2. Update the `.env` file with your local database details.

### Generate Application Key

```bash
php artisan key:generate
```

### Setup Database

1. Create a new database.
2. Run migrations and seed the database:

   ```bash
   php artisan migrate --seed
   ```

### Run the Application

```bash
php artisan serve
```

Open in your browser:
[http://localhost:8000](http://localhost:8000)

## API Endpoints

| Method | Endpoint        | Description                     |
|--------|-----------------|---------------------------------|
| GET    | /api            | Fetch all tools                 |
| GET    | /api?search=    | Search tools by keyword         |
| GET    | /api?tag=       | Filter tools by tag             |
| GET    | /api?category=  | Filter tools by category        |
| GET    | /api/{id}       | Fetch a specific tool by its ID |

## Testing

- Run the following command to acquire data:
   ```bash
   http GET http://localhost/api
   ```

- Data Acquired with GET Method:

```json
{
    "data": [
        {
            "name": "GIMP",
            "summary": "Open-source image editor",
            "description": "A powerful alternative to Photoshop with advanced editing features.",
            "link": "https://www.gimp.org/",
            "icon": "https://logo.clearbit.com/gimp.org",
            "category": "Design",
            "tags": [
                "photo-editing",
                "graphics"
            ]
        }
    ],
}    
```
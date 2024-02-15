# Todist-CRM

Todist-CRM is a Customer Relationship Management (CRM) system built with Laravel and Laravel Filament.

## What is a CRM?

A Customer Relationship Management (CRM) system helps manage customer data. It supports sales management, delivers actionable insights, integrates with social media and facilitates team communication. Cloud-based CRM systems offer complete mobility and access to an ecosystem of bespoke apps.

This CRM, Todist-CRM, is designed to help you manage and analyze customer interactions and data throughout the customer lifecycle, with the goal of improving customer service relationships and assisting in customer retention and driving sales growth.

## Features

-   Customer management
-   Interaction tracking
-   Analytics and reporting
-   And more...

## Installation

Follow these steps to get Todist-CRM up and running:

1. Clone the repository:

```bash
git clone https://github.com/Edward-Kabue/Todoist-crm.git
```

2. Navigate into the project directory:

```bash
cd todist-crm
```

3. Install the PHP dependencies:

```bash
composer install
```

4. Copy the example environment file and configure it to match your environment:

```bash
cp .env.example .env
```

5. Generate an application key:

```bash
php artisan key:generate
```

6. Run the database migrations (Set your database connection in `.env` before migrating):

```bash
php artisan migrate
```

7. Start the local development server:

```bash
php artisan serve
```

You should now be able to access the application at `http://localhost:8000`.

## License

Todist-CRM is open-sourced software licensed under the [MIT license](LICENSE.md).

```

```

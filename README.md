# YouQuote - Quote Management API

<p align="center">
  YouQuote
</p>

<p align="center">
  <a href="#features"><img src="https://img.shields.io/badge/status-active-success.svg" alt="Status"><img src="https://img.shields.io/badge/status-active-success.svg" alt="Status"></a>
  <a href="#license"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a>  <a href="#license"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a>
  <a href="#built-with"><img src="https://img.shields.io/badge/framework-Laravel-red.svg" alt="Framework"></a><img src="https://img.shields.io/badge/framework-Laravel-red.svg" alt="Framework"></a>
</p></p>

## About YouQuote## About YouQuote

YouQuote is a powerful API for managing quotes. Built with Laravel, YouQuote allows users to create, read, update, and delete quotes, as well as retrieve random quotes and filter quotes based on length. The API also tracks the popularity of most requested quotes and offers bonus features like image generation for popular quotes and secure user authentication.ows users to create, read, update, and delete quotes, as well as retrieve random quotes and filter quotes based on length. The API also tracks the popularity of most requested quotes and offers bonus features like image generation for popular quotes and secure user authentication.

## Features

### Core Features

- **Complete CRUD Operations**: Create, read, update, and delete quotes- **Complete CRUD Operations**: Create, read, update, and delete quotes
- **Random Quote Generation**: Get one or multiple random quotes on demand
- **Quote Filtering by Length**: Filter quotes based on word count- **Quote Filtering by Length**: Filter quotes based on word count
- **Popularity Tracking**: Automatically track which quotes are most frequently requestedking**: Automatically track which quotes are most frequently requested

### Bonus Features

- **Quote Image Generation**: Create beautiful images featuring popular quotes
- **User Authentication**: Secure registration and login system allowing users to manage their own quotes- **User Authentication**: Secure registration and login system allowing users to manage their own quotes

## Technology Stack## Technology Stack

- **Backend Framework**: Laravel- **Backend Framework**: Laravel
- **Architecture**: Monolithic architecture for centralized management
- **Database**: MySQL for storing quotes, tracking popularity, and user information- **Database**: MySQL for storing quotes, tracking popularity, and user information
- **Image Generation**: Integration with Intervention Image library**: Integration with Intervention Image library
- **Authentication**: Sanctum   for secure access- **Authentication**: Sanctum 

## Installation

```bash
# Clone the repository
git clone https://github.com/adilaitelhoucine1/youquote-project.git

# Navigate to the project directory
cd youquote-project

# Install dependencies
composer install

# Copy environment file# Copy environment file
cp .env.example .env .env

# Generate application key
php artisan key:generatephp artisan key:generate

# Configure your database in .env# Configure your database in .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=youquote# DB_DATABASE=youquote
# DB_USERNAME=root
# DB_PASSWORD=# DB_PASSWORD=

# Run migrations# Run migrations
php artisan migrate

php artisan db:seed

# Start the development server
php artisan serve
```

## API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET    | `/api/quotes` | Get all quotes |
| GET    | `/api/quotes/{id}` | Get a specific quote |
| POST   | `/api/quotes` | Create a new quote |
| PUT    | `/api/quotes/{id}` | Update a quote |
| DELETE | `/api/quotes/{id}` | Delete a quote |
| GET    | `/api/quotes/random` | Get a random quote |
| GET    | `/api/quotes/random/{count}` | Get multiple random quotes |
| GET    | `/api/quotes/filter/{length}` | Filter quotes by word count |
| GET    | `/api/quotes/popular` | Get popular quotes |
| GET    | `/api/quotes/image/{id}` | Generate image for a quote |

## Authentication Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST   | `/api/register` | Register a new user |
| POST   | `/api/login` | Login user |
| POST   | `/api/logout` | Logout user |

## Development Roadmap

- [x] Basic CRUD functionality
- [x] Random quote generation
- [x] Quote filtering by length
- [x] Popularity tracking
- [ ] Image generation for quotes



## License5. Open a Pull Request4. Push to the branch (`git push origin feature/amazing-feature`)- [ ] User authentication
- [ ] User-specific quote management
- [ ] API rate limiting
- [ ] Advanced filtering options

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)

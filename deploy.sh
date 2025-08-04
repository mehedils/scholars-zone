#!/bin/bash

echo "🚀 Starting production deployment..."

# Build assets
echo "📦 Building assets..."
npm run build

# Set production environment
echo "⚙️ Setting production environment..."
sed -i 's/APP_ENV=local/APP_ENV=production/' .env
sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env

# Clear caches
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Cache for production
echo "💾 Caching for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Production deployment completed!"
echo "📝 Don't forget to:"
echo "   - Set proper APP_URL in .env"
echo "   - Configure your web server"
echo "   - Set up proper file permissions" 
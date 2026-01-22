# WebGIS Drone Survey Platform

A secure Django-based platform for publishing and managing drone survey data including Orthomosaic, DTM, DSM, 3D Mesh, and Point Cloud datasets.

## 🚀 Quick Start in Codespace

### 1. Initial Setup

```bash
# Make setup script executable
chmod +x setup.sh

# Run setup script
./setup.sh
```

### 2. Manual Setup (if needed)

```bash
# Activate virtual environment
source venv/bin/activate

# Install dependencies
pip install -r requirements.txt

# Start database
docker-compose up -d

# Wait for database to start
sleep 10

# Run migrations
python manage.py makemigrations
python manage.py migrate

# Create superuser
python manage.py createsuperuser

# Start development server
python manage.py runserver 0.0.0.0:8000
```

## 📋 Features

- ✅ Secure JWT-based authentication
- ✅ Role-based access control (Admin, Editor, Viewer)
- ✅ PostgreSQL with PostGIS for spatial data
- ✅ Support for multiple data types:
  - Orthomosaic imagery
  - Digital Terrain Models (DTM)
  - Digital Surface Models (DSM)
  - 3D Mesh models
  - Point Cloud data
- ✅ Project-based organization
- ✅ Access logging and tracking

## 🔐 API Endpoints

### Authentication

```
POST /api/auth/register/          - Register new user
POST /api/auth/login/             - Login (get JWT tokens)
POST /api/auth/refresh/           - Refresh access token
GET  /api/auth/profile/           - Get user profile
PUT  /api/auth/profile/           - Update user profile
POST /api/auth/change-password/   - Change password
GET  /api/auth/users/             - List users (admin only)
```

### Example: User Registration

```bash
curl -X POST http://localhost:8000/api/auth/register/ \
  -H "Content-Type: application/json" \
  -d '{
    "username": "john_doe",
    "email": "john@example.com",
    "password": "SecurePass123!",
    "password2": "SecurePass123!",
    "organization": "Survey Corp"
  }'
```

### Example: Login

```bash
curl -X POST http://localhost:8000/api/auth/login/ \
  -H "Content-Type: application/json" \
  -d '{
    "username": "john_doe",
    "password": "SecurePass123!"
  }'
```

Response:
```json
{
  "access": "eyJ0eXAiOiJKV1QiLCJhbGc...",
  "refresh": "eyJ0eXAiOiJKV1QiLCJhbGc..."
}
```

## 🗂️ Project Structure

```
webgis_platform/
├── authentication/         # User management & auth
│   ├── models.py          # Custom User model
│   ├── serializers.py     # API serializers
│   ├── views.py           # Auth endpoints
│   └── urls.py            # URL routing
├── maps/                  # GIS data models
│   ├── models.py          # Dataset models
│   ├── serializers.py     # GIS serializers
│   ├── views.py           # GIS endpoints
│   └── urls.py            # URL routing
├── data_storage/          # File upload handling
├── media/                 # User uploaded files
│   ├── orthomosaic/
│   ├── dtm/
│   ├── dsm/
│   ├── mesh/
│   └── pointcloud/
├── static/                # Static files
├── webgis_platform/       # Main settings
│   ├── settings.py
│   └── urls.py
├── docker-compose.yml     # Database setup
├── requirements.txt       # Python dependencies
└── manage.py             # Django management
```

## 🗃️ Database Models

### User Roles
- **Admin**: Full access, user management
- **Editor**: Can upload and edit datasets
- **Viewer**: Read-only access

### Data Models
- **Project**: Container for related datasets
- **DroneDataset**: Base model for all data types
- **Orthomosaic**: Raster imagery data
- **ElevationModel**: DTM/DSM elevation data
- **Mesh3D**: 3D mesh models
- **PointCloud**: Point cloud data

## 🛠️ Next Steps

### 1. Create URL routes for maps app

Create `maps/urls.py`:
```python
from django.urls import path
from . import views

urlpatterns = [
    # Add your map endpoints here
]
```

### 2. Build frontend application

You can use:
- React with Leaflet/OpenLayers for 2D maps
- React with Cesium for 3D visualization
- Vue.js with any mapping library

### 3. Implement file upload handling

Create views in `data_storage/` for handling large file uploads.

### 4. Add tile server

Integrate with GeoServer or MapServer for serving tiles.

### 5. Deploy to production

- Use proper SECRET_KEY
- Set DEBUG=False
- Configure ALLOWED_HOSTS
- Enable HTTPS
- Use production database
- Set up cloud storage for media files

## 🔒 Security Checklist

- ✅ JWT authentication implemented
- ✅ Password validation enabled
- ✅ Role-based access control
- ⚠️ Change SECRET_KEY in production
- ⚠️ Enable HTTPS in production
- ⚠️ Configure CORS properly
- ⚠️ Set up rate limiting
- ⚠️ Enable database backups

## 📚 Useful Commands

```bash
# Activate virtual environment
source venv/bin/activate

# Create new migration
python manage.py makemigrations

# Apply migrations
python manage.py migrate

# Create superuser
python manage.py createsuperuser

# Start development server
python manage.py runserver 0.0.0.0:8000

# Access Django shell
python manage.py shell

# Stop database
docker-compose down

# View database logs
docker-compose logs db
```

## 🐛 Troubleshooting

### Database connection issues
```bash
# Check if PostgreSQL is running
docker-compose ps

# Restart database
docker-compose restart db
```

### Migration issues
```bash
# Reset migrations (development only!)
python manage.py migrate --fake-initial
```

## 📖 Documentation

- Django: https://docs.djangoproject.com/
- Django REST Framework: https://www.django-rest-framework.org/
- PostGIS: https://postgis.net/documentation/
- GeoDjango: https://docs.djangoproject.com/en/stable/ref/contrib/gis/

## 📧 Support

For issues and questions, check the Django and GeoDjango documentation or create an issue in your repository.

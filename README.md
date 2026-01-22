Hello! Creating a website for publishing WebGIS maps from drone surveys is an excellent project. Here's how you can get started:
Initial Planning

Define Requirements

User authentication system
Secure database for storing geospatial data
Visualization capabilities for orthomosaic, DTM, DSM, 3D mesh, and point cloud data
User permissions/roles system


Choose Tech Stack

Backend: Node.js, Python (Django/Flask), or Java
Frontend: JavaScript framework like React, Vue, or Angular
Database: PostgreSQL with PostGIS extension for spatial data
Authentication: OAuth, JWT tokens
WebGIS Libraries: Leaflet, OpenLayers, or Cesium for 3D visualization



Implementation Steps
1. Set up Authentication System

Implement secure login with HTTPS
Use industry-standard authentication like OAuth 2.0
Set up password hashing and MFA
Create user roles (admin, editor, viewer)

2. Create Secure Database

PostgreSQL with PostGIS is ideal for geospatial data
Implement proper data encryption
Set up regular backups
Create schema for user data and geospatial information

3. Implement WebGIS Components

For orthomosaic and 2D data (DTM/DSM): Leaflet or OpenLayers
For 3D mesh and point cloud: Cesium JS or Three.js
Set up tile servers for efficient serving of large orthomosaic images

4. Data Processing Pipeline

Create a workflow for processing raw drone data
Implement data validation and quality checks
Set up storage for both raw and processed data

5. User Interface

Design intuitive navigation for different data types
Create comparison tools (e.g., before/after slider)
Implement measurement and annotation tools

Framework Options
For a complete solution, consider these approaches:

Custom Development:

Full control but higher development effort
Build with React/Angular + Node.js + PostgreSQL/PostGIS


GIS Platforms with Extensions:

GeoServer or MapServer for data serving
Custom frontend with authentication


Specialized WebGIS Frameworks:

TerriaJS - open-source framework specifically for spatial data catalogs
GeoNode - Django-based geospatial content management system

# DEV_UP Project Export for Claude Analysis

## Project Overview
DEV_UP is a Laravel-based learning platform focused on helping developers improve their coding skills through challenges, focus sessions, and progress tracking.

## Database Schema (Migrations)

### Core Tables:
1. **users** - User management with roles (admin, formateur, apprenant)
2. **challenges** - Coding challenges with difficulty levels
3. **categories** - Challenge categorization
4. **questions** - Individual questions within challenges
5. **reponses** - User answers to questions
6. **focus_sessions** - Pomodoro-style timer sessions
7. **submissions** - Challenge submissions with feedback
8. **progressions** - User progress tracking

### Supporting Tables:
- **user_challenges** - Many-to-many relationship
- **badges** - Achievement system
- **notifications** - User notifications
- **feedback** - Submission feedback
- **user_badge** - User-badge relationships

## Key Models & Relationships

```php
// User Model
class User extends Authenticatable {
    // Has many challenges, focus sessions, progressions, submissions
    // Role-based: admin, formateur, apprenant
}

// Challenge Model  
class Challenge {
    // Belongs to category
    // Has many questions, submissions
    // Many-to-many with users
}

// FocusSession Model
class FocusSession {
    // Belongs to user
    // Timer functionality
}

// Progression Model
class Progression {
    // Tracks user progress through challenges
    // Belongs to user and challenge
}
```

## Features Implemented

### Authentication & Authorization
- Laravel Breeze authentication
- Role-based access control
- Email verification

### Core Functionality
- **Challenges**: Create, submit, evaluate coding challenges
- **Focus Sessions**: Pomodoro timer with break management
- **Progress Tracking**: User progress and analytics
- **Categories**: Content organization
- **Q&A System**: Questions and responses

### UI/UX
- Simplified, clean design
- Responsive layout
- Role-specific dashboards
- Navigation with proper routing

## Routes Structure
- `/` - Welcome page
- `/login`, `/register` - Authentication
- `/dashboard` - Main dashboard (role-based)
- `/challenges` - Challenge management
- `/focus-sessions` - Timer sessions
- `/profile` - User profile

## Class Diagram (Simplified 8 Classes)
```
User - Challenge - FocusSession - Category
Question - Response - Progression - Submission
```

## Database Configuration
- PostgreSQL database
- Connection via Docker (dockhosting.dev:49706)
- Proper foreign key relationships
- Timestamps and soft deletes where appropriate

## Technical Stack
- **Backend**: Laravel 11/12
- **Frontend**: Blade templates with simple CSS
- **Database**: PostgreSQL
- **Authentication**: Laravel Breeze
- **Styling**: Minimal CSS (no heavy frameworks)

## Current Status
- All core models implemented
- Basic CRUD operations working
- Authentication system functional
- UI simplified and clean
- Class diagram ready for analysis

## For Claude: Class Diagram Analysis Request
Please analyze the current 8-class simplified UML diagram and provide:
1. Class relationship validation
2. Design pattern suggestions
3. Potential improvements
4. Database schema optimization recommendations

The class diagram is available in `class_diagram.puml` and represents the core domain model of the DEV_UP learning platform.
